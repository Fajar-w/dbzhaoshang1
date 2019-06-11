<?php

namespace App\Http\Controllers\Admin;
use App\AdminModel\Category;
use App\AdminModel\Spage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth.admin:admin');
    }
    public function Index(){
      
        $infos = Category::where('term_id',2)->first();

        return view('admin.info.info',compact('infos'));

    }

     public function PostIndex(Request $request){
        $infodata['name']=$request['name'];
        $infodata['slug']=$request['slug'];
        $infodata['seo_title']=$request['seo_title'];
        $infodata['seo_keys']=$request['seo_keys'];
        $infodata['seo_des']=$request['seo_des'];

        Category::where('term_id',$request->term_id)->update($infodata);
        return redirect('admin/info')->with('success','修改成功');
    }
    public function spageIndex(){
      
        $spagearr = Spage::get();

        return view('admin.spage.index',compact('spagearr'));

    }

    public function spageUpdate($id){
      
        $spagearr = Spage::where('ID',$id)->first();

        return view('admin.spage.spage_edit',compact('spagearr','id'));

    }

    public function spagePostUpdate(Request $request,$id){
        $postdata['post_author'] = auth('admin')->user()->id;
        $postdata['post_content'] = $this->conImg($request['post_content']);
        $postdata['post_title']=$request['post_title'];
        $postdata['seotitle']=$request['seotitle'];
        $postdata['seokeys']=$request['seokeys']?$request['seokeys']:$request['post_title'];
        $postdata['views']=rand(300,630);
        $postdata['post_name']=$request['post_name'];
        $postdata['status']=$request['status'];
        Spage::where('ID',$id)->update($postdata);
        return redirect(action('Admin\InfoController@spageIndex'))->with('success','编辑单页成功');
        
    }
    public function spageCreate(){
      
        return view('admin.spage.create');

    }

    public function spagePostCreate(Request $request){
        $postdata['post_author'] = auth('admin')->user()->id;
        $postdata['post_content'] = $this->conImg($request['post_content']);
        $postdata['post_title']=$request['post_title'];
        $postdata['seotitle']=$request['seotitle'];
        $postdata['seokeys']=$request['seokeys']?$request['seokeys']:$request['post_title'];
        $postdata['views']=rand(300,630);
        $postdata['post_name']=$request['post_name'];
        $postdata['status']=$request['status'];
        $postdata['post_date']=date('Y-m-d H:i:s');
        Spage::create($postdata);
        return redirect(action('Admin\InfoController@spageIndex'))->with('success','添加单页成功');
        
    }

    public function logs(){
        $dir="/wwww/website/comcy580/public/ddlog/";
        if (false != ($handle = opendir ( $dir ))) {
           $content = "最新日志列表(30天)：<br>";
            $i = 1;
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && !is_dir($dir.'/'.$file)) {
                        $files[$i]["name"] = $file;
                        $files[$i]["time"] = date("Y-m-d H:i:s",filemtime($dir.$file));
                        $i++;
                        // $dirArray[]= $file;
                }
            }
            closedir($handle);
            foreach($files as $k=>$v){
                // $size[$k] = $v['size'];
                $time[$k] = $v['time'];
                $name[$k] = $v['name'];
            }
             array_multisort($time,SORT_DESC,SORT_STRING, $files);
            foreach($files as $k=>$v){
                 if($k < 30){
                        $content .= '<a href="/admin/downlogs/' . $v['name'] . '" target="_blank">'.$v['name']. '</a><br>';
                 }
                 if($k > 60){
                        unlink($dir.$v['name']);   
                 }
            }
         
        }
        return view('admin.logs.index',compact('content'));
        
    }

    public function downlogs($url){
       
       $filename =  'http://www.imnotdoubi.test/ddlog/'.$url;

        $mime = 'application/force-download';

        header('Pragma: public');

        header('Expires: 0');

        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

        header('Cache-Control: private',false);

        header('Content-Type: '.$mime);

        header('Content-Disposition: attachment; filename="'.basename($filename).'"');

        header('Content-Transfer-Encoding: binary');

        header('Connection: close');

        readfile($filename);

        exit();
                
    }

    //文章内远程图片本地化
    function conImg($content)
    {
        $save_path = $_SERVER ['DOCUMENT_ROOT'] . '/images/thread/';
        // 文件保存目录URL
        $save_url = '/images/thread/';
        $save_path = realpath ( $save_path ) . '/';
        // 图片存储目录
        $imgPath = $save_path . date ( "Y" ). "/". date ( "m" ). '/'. date ( "d" );
        $imgUrl = $save_url . date ( "Y" ). '/'. date ( "m" ). '/'. date ( "d" );
        // dd($imgUrl);
        // 创建文件夹
        // if (! is_dir ( $imgPath )) {
        //     @mkdir ( $imgPath, 0777 );
        // }

        if (!file_exists($imgPath)){
            mkdir($imgPath,0777,true);
        }
      
        $content = stripslashes ( $content );
        $img_array = array ();
        // 匹配所有远程图片
        preg_match_all ("/<img([^>]*)\ssrc=([^\s>]+)/", $content, $img_array );
        // 匹配出来的不重复图片
        $img_array = array_unique ( $img_array [2] );
        
        // 时间无限制
        set_time_limit ( 0 );
        foreach ( $img_array as $key => $value ) {

                if(strstr($value,'storage/uploads')===false){
                    $img = str_replace('"','',$value);
                    if(substr($img, -1)=='/')
                             $img = substr($img, 0,strlen($img)-1);
                    $imgname = date ( "YmdHis" ) . '_' . rand ( 10000, 99999 ) . ".jpg" ;
                    // 保存到本地的实际文件地址（包含路径和名称）
                    $fileName = $imgPath . '/' . $imgname;
                   //  // 实际访问的地址
                    $fileurl = '"'.$imgUrl . "/" . $imgname.'"';
                    
                   //  // 文件写入
                    ob_start();//打开输出
                    if(strstr($img,'http://') || strstr($img,'https://'))
                         readfile($img);//输出图片文件
                    else
                        readfile($_SERVER ['DOCUMENT_ROOT'].$img);//输出图片文件
                    $img = ob_get_contents();//得到浏览器输出
                    ob_end_clean();//清除输出并关闭
                    if(strstr($img,'http://') || strstr($img,'https://'))
                         $size = strlen($img);//得到图片大小
                    else
                            $size = strlen($_SERVER ['DOCUMENT_ROOT'].$img);//得到图片大小
                   
                    $fp2 = @fopen($fileName, "a");
                    fwrite($fp2, $img);//向当前目录写入图片文件，并重新命名
                    fclose($fp2);
                    
                    // 替换原来的图片地址
                    $content = str_replace ( $value, $fileurl, $content );
                }
           
            
        }
        return  $content;
 
    }


}
