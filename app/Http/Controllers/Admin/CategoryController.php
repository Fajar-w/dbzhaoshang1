<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * 网站后台栏目管理首页
     * @param
     *
     * @return
     */
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
  

    function Index(){

        $topnavs= Category::where('taxonomy','!=','index')->where('parent',0)->orderby('term_group')->get();
        $recursivestypeinfos = Category::where('taxonomy','!=','index')->where('parent','>',0)->get();

        return view('admin.category.category',compact('topnavs','recursivestypeinfos'));
    }



    /**
     * 栏目创建界面
     * @param 栏目id
     *
     * @return
     */
    function Create($id=0)
    {
        $topnavs= Category::where('taxonomy','!=','index')->where('parent',0)->get();
        $recursivestypeinfos = Category::where('taxonomy','!=','index')->where('parent','>',0)->get();

        return view('admin.category.category_create',compact('id','topnavs','recursivestypeinfos'));
    }

    /**
     * 栏目创建提交数据处理
     * @param request验证
     *
     * @return
     */

    function PostCreate(StoreCategoryRequest $request){

        // $termdata['name'] = $request['name'];
        // $termdata['slug'] = $request['slug'];
        // $termTaxonomydata['description'] = $request['txdescription'];
        // $title = $request['title'];
        // $keywords = $request['keywords'];
        // $description = $request['description'];

        // $optiondata['option_value'] =  'a:3:{s:5:"title";s:'.strlen($title).':"'.$title.'";s:8:"keywords";'.strlen($keywords).':"'.$keywords.'";s:11:"description";s:'.strlen($description).':"'.$description.'";}';
        
        $termdata['name'] = $request['name'];
        $termdata['slug'] = $request['slug'];
        $termdata['description'] = $request['description'];
        $termdata['seo_title'] = $request['seo_title'];
        $termdata['seo_keys'] = $request['seo_keys'];
        $termdata['seo_des'] = $request['seo_des'];
        $termdata['seo_des'] = $request['seo_des'];
        $termdata['parent'] = $request['parent'];
        $termdata['term_group'] = $request['term_group'];
        $termdata['taxonomy'] = $request['taxonomy'];
      //    // a:3:{s:5:"title";s:'.strlen($title).':"'.$title.'";s:8:"keywords";s:'.strlen($keywords).':"'.$keywords.'";s:11:"description";s:174:"招商创业网（imnotdoubi.test）行业百科知识点大全为您提供创业宝典、创业加盟问答、网店经营、各个行业相关的问题解答，让您更轻松创业。";}
       
        
      // //  dd($requestdata);
       

        $termtaxdata['term_taxonomy_id'] = Category::insertGetId($termdata);


        Category::where('term_id',$termtaxdata['term_taxonomy_id'])->update($termtaxdata);

        //  $termTaxonomydata = array(
        //                     'term_id' => $term_id ,
        //                     'taxonomy' => $request['taxonomy'],
        //                     'description'=> $request['txdescription'],
        //                     'parent'=> $request['term_id'],
        //               );


        // // $termTaxonomydata['term_id'] = $termAdd->term_id;
        // // $termTaxonomydata['taxonomy'] = $request['taxonomy'];


        // TermTaxonomy::insert($termTaxonomydata);
        //  $optiondata['option_name'] = '_taxonomy_meta_'.$term_id;

        // Option::create($optiondata);

        // Arctype::create($requestdata);
        return redirect(action('Admin\CategoryController@Index'));


    }

   
 

    
    /**
     * 栏目编辑界面
     * @param 栏目id
     *
     * @return
     */
    function Edit($termid){
        $typeinfos=Category::where('term_id',$termid)->first();
        // $topnavs= Category::where('taxonomy','!=','index')->where('parent',0)->get();
        // $recursivestypeinfos = Category::where('taxonomy','!=','index')->where('parent','>',0)->get();

        $topnavs = cache()->remember('catetopnavs_'.$termid, 30, function() {
            return   Category::where('taxonomy','!=','index')->where('parent',0)->get();
        });
       $recursivestypeinfos = cache()->remember('caterecursivestypeinfos_'.$termid, 30, function()  {
              return   Category::where('taxonomy','!=','index')->where('parent','>',0)->get();
        });

       // $optionValue = Option::where('option_name','_taxonomy_meta_'.$termid)->value('option_value');

      //  $title = $this->getOptionValue($optionValue,1);
       // dd($title);
       // $keywords = $this->getOptionValue($optionValue,2);
      //  $description = $this->getOptionValue($optionValue,3);

        // $pics=array_filter(explode(',',Arctype::where('id',$id)->value('typeimages')));

        return view('admin.category.category_edit',compact('typeinfos','termid','topnavs','recursivestypeinfos'));
    }
    /**
     * 栏目更改数据提交处理界面
     * @param   request验证 ，栏目id
     *
     * @return redirect
     */
    function PostEdit(Request $request,$termid)
    {
//dd($request->all());
        // Category::where('term_id',$termid)->update($request->all());

      //   // $parentid = TermTaxonomy::where('term_id',$request['term_id'])->value('parent');


        $termdata['name'] = $request['name'];
        $termdata['slug'] = $request['slug'];
        $termdata['description'] = $request['description'];
        $termdata['seo_title'] = $request['seo_title'];
        $termdata['seo_keys'] = $request['seo_keys'];
        $termdata['seo_des'] = $request['seo_des'];
        $termdata['term_group'] = $request['term_group'];
        $termdata['taxonomy'] = $request['taxonomy'];
        // $termdata['parent'] = $request['parent'];

      //    // a:3:{s:5:"title";s:'.strlen($title).':"'.$title.'";s:8:"keywords";s:'.strlen($keywords).':"'.$keywords.'";s:11:"description";s:174:"招商创业网（imnotdoubi.test）行业百科知识点大全为您提供创业宝典、创业加盟问答、网店经营、各个行业相关的问题解答，让您更轻松创业。";}
       
        
      // //  dd($requestdata);
        Category::where('term_id',$termid)->update($termdata);
       // TermTaxonomy::where('term_id',$termid)->update($termTaxonomydata);

       // Option::where('option_name','_taxonomy_meta_'.$termid)->update($optiondata);

        return redirect(action('Admin\CategoryController@Index'));


    }


    /**
     * 栏目删除
     * @param   $request验证，栏目id
     *
     * @return redirect
     */
    function DeleteCategory(Request $request,$id){
        
         if(empty(where::where('term_id',$id)->value('term_taxonomy_id')))
        {

            Category::where('term_id',$id)->delete();
            TermTaxonomy::where('term_id',$id)->delete();

            Option::where('option_name','_taxonomy_meta_'.$id)->delete();
            return '栏目删除成功';
        }else{
            return '当前栏目包含子栏目，请先删除子栏目';
        }

    }

    /**
     * 缩略图上传
     * @param $request请求信息
     *
     * @return 上传后图片地址
     */
    function UploadImage($request){
        if(!$request->hasFile('image')){
            return $img_relpath='';
        }
        $file = $request->file('image');
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
        $img_relpath='/images/thread/'.date('Y/m/d/',time()). $fileName;
        return $img_relpath;
    }



    //文章内远程图片本地化
    function conImg($content,$cz=1)
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
      //  print_r($img_array);
        
        // 时间无限制
        set_time_limit ( 0 );
        foreach ( $img_array as $key => $value ) {
            if($cz ==1){
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
            }else{
                if(strstr($value,'storage/uploads')===false){
                    if(strstr($value,'/images/thread') ===false){

                        //dd($value);
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
            }
            
            
        }
        return  $content;
 
    }

     function getOptionValue($value,$len)
    {
       // a:3:{s:5:"title";s:53:"行业百科知识点，让您轻松创业 -招商创业网";s:8:"keywords";s:25:"百科知识,轻松创业";s:11:"description";s:174:"招商创业网（imnotdoubi.test）行业百科知识点大全为您提供创业宝典、创业加盟问答、网店经营、各个行业相关的问题解答，让您更轻松创业。";}
        $tlen = strpos ($value,'s:5:"title";');
        $klen = strpos ($value,'";s:8:"keywords";');
        $dslen = strpos ($value,'";s:11:"description";');

        $tstr2 = substr($value,$tlen,$klen-$tlen);
        $lenlen = strlen($value);

   

        if($len==1){
            $tlen2 = strripos ($tstr2,':"');
            $tstr = substr($tstr2,$tlen2+2);
            return $tstr;
        }
        if($len==2){

            $kstr2 = substr($value,$klen+17,$dslen-$klen-17);
            $klen2 = strripos ($kstr2,':"');
            $kstr = substr($kstr2,$klen2+2);
            return $kstr;
        }
        if($len==3){
            $dstr2 = substr($value,$dslen+21,$lenlen-$dslen-24);
           // dd($dstr2);
            $dlen2 = strripos ($dstr2,':"');
            $dstr = substr($dstr2,$dlen2+2);
            return $dstr;
        }

    }

}

