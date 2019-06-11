<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/2/24
 * Time: 16:02
 */

namespace App\Helpers;
use Illuminate\Http\Request;
use App\AdminModel\Arctype;

class UploadImages
{
    /**
     * 图像上传处理
     * @param $request数据
     *
     * @return arraydatas
     */
    public static function UploadImage($request)
    {

        if(!$request->hasFile('image'))
        {
            return $img_relpath='';
        }

        $file = $request->file('image');
        //判断文件上传过程中是否出错
        $allowed_extensions = ["png", "jpg", "gif","jpeg"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions))
        {
            exit('error You may only upload png, jpg jpegor gif');
        }
        $upload_path='images/thread'.date('/Y/m/d',time());

       // dd($upload_path."==-");
        $destinationPath =public_path($upload_path);
        $extension = $file->getClientOriginalExtension();
        $fileName = md5(str_random(10)).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $img_relpath='/images/thread/'.date('Y/m/d/',time()). $fileName;
        // dd($img_relpath."==-");
        return $img_relpath;
    }
    /**
     * 自定义文档属性
     * @param array
     *
     * @return arraydatas
     */
    static function Flags(array $arr)
    {
        $flags='';
        foreach ($arr as $value)
        {
            $flags.=$value.',';
        }
        return substr($flags,0,-1);
    }

    public static function arctypes()
    {
        return Arctype::orderby('id','desc')->get();
    }


}