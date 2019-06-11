<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Arctype;
use App\Http\Requests\ImagesUploadRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
    /**
     * 图片上传处理
     * @param
     *
     * @return
     */
    function ImagesUpload(ImagesUploadRequest $request)
    {
        if(!empty($request['input-image'])){
            if(!$request->hasFile('input-image')){
                exit('上传文件为空！');
            }else{
                $file = $request->file('input-image');
                //判断文件上传过程中是否出错
                $allowed_extensions = ["png", "jpg", "gif","jpeg"];
                if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                    exit(['error' => '您上传的图片文件格式不在ping,jpg,gif,jpeg范围之内']);
                }
            }

            $upload_path='images/thread'.date('/Y/m/d',time());
            $destinationPath =public_path($upload_path);
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(str_random(10)).'.'.$extension;
            $file->move($destinationPath, $fileName);
            $img_relpath=date('Y/m/d/',time()). $fileName;
            $litpic= '/images/thread/'.$img_relpath;
            return json_encode(array('link'=>"$litpic"));

        }
        var_dump($request->all());
    }
    /**
     * 图片删除处理
     * @param
     *
     * @return
     */
    function DeletePics(Request $request){
        $requestinfo=$request->input('key');
        $arrinfos=explode(',',$requestinfo);
        $imageslitpic=str_replace(',,',',',str_replace($arrinfos[1],'',Arctype::where('id',$arrinfos[2])->value('typeimages')));
        Arctype::where('id', $arrinfos[2])->update(
            [
                'typeimages'=>$imageslitpic
            ]);

        return $arrinfos[0] ;

    }
    /**
     * 图片上传
     * @param
     *
     * @return
     */
    public function upload_image(Request $request)
    {

        if(!$request->hasFile('file')){
            exit('上传文件为空！');
        }
        $file = $request->file('file');
        //判断文件上传过程中是否出错
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            exit(['error' => 'You may only upload png, jpg or gif.']);
        }
        $upload_path='images/thread'.date('/Y/m/d',time());
        $destinationPath =public_path($upload_path);
        $extension = $file->getClientOriginalExtension();
        $fileName = md5(str_random(10)).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $img_relpath=date('Y/m/d/',time()). $fileName;
        return $img_relpath;

    }

}
