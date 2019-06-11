<?php

namespace App\Http\Controllers\Admin;

// use App\AdminModel\ArchiveData;
use App\AdminModel\AdminRole;
use App\AdminModel\Admin;
use App\AdminModel\Project;
use App\AdminModel\Category;
use App\AdminModel\News;
use App\AdminModel\Pnew;
use App\AdminModel\Tags;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\CreateLink2Request;
use App\Helpers\UploadImages;
use App\Http\Requests\ImagesUploadRequest;
use App\Notifications\ArticlePublishedNofication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Log;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function Keywords(Request $request)
    {
        $topnavs = cache()->remember('newsarttopnavsds_', 30, function() {
            return   Category::where('taxonomy','news')->get();
        });

         $typeid = str_replace("/","",$request->term_id);
        $topid = '';
        if($typeid)
            $topid =  Category::where('term_id', $typeid)->value('parent');



        $arguments=$request->all();
        $pterm_id = $term_id = '';
         if(!empty($request->status))
            $articles = News::select('ID','post_title','pterm_id','term_id','post_date','status')->where('status',2) ;
         else
            $articles = News::select('ID','post_title','pterm_id','term_id','post_date','status')->where('status',1) ; 

              
        if(!empty($request->start_at))
              $articles->where('post_date', '>',Carbon::parse($request->start_at));
        if(!empty($request->end_at))
              $articles->where('post_date', '<',Carbon::parse($request->end_at));    
        
         if(!empty($request->term_id))
         {

              if($topid==0){
                $articles->where('pterm_id',$request->term_id);
                $pterm_id = $request->term_id;
              }
                else{
                  $articles->where('term_id',$request->term_id);
                  $term_id = $request->term_id;
                }
         }
         if(!empty($request->title))
            $articles->where('post_title','like','%'.$request->title.'%');
       
           
          $articles = $articles->orderBy('ID','desc')->paginate(20);
            
        return view('admin.project.new_list',compact('articles','arguments','topnavs','pterm_id','term_id'));
    }
     /**普通文档创建
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function KeywordsCreate($id)
    {

        if($id==2){
             $topnavs = cache()->remember('newsarcCreatetopnav6ss_', 30, function() {
                return   Category::where('taxonomy','news')->orderBy('term_group','ASC')->get();
            });

        }else{

            $topnavs = cache()->remember('arcCreatetopnav6ss_', 30, function() {
                return  Category::where('taxonomy','category')->orderBy('term_group','ASC')->get();
            });
           //  $topnavs = cache()->remember('arcCreatetopnavs_', 30, function() {
           //      return   Category::where('taxonomy','category')->where('parent',0)->get();
           //  });
           // $recursivestypeinfos = cache()->remember('arcCreaterecursivestypeinfos_', 30, function()  {
           //        return   Category::where('taxonomy','category')->where('parent','>',0)->get();
           //  });
        }
        
        return view('admin.project.project_create',compact('topnavs','id'));

    }   
   

    /**文档创建提交数据处理
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostKeywordsCreate(CreateArticleRequest $request,$id)
    {   
       
       //重复文档监测
            if(Project::where('post_title',$request['post_title'])->value('id'))
            {
                exit('标题重复，禁止发布');
            }
      // dd(auth('admin')->user()->id);
        $request['post_author'] = auth('admin')->user()->id;


        if(isset($request['flags']))
        {
            // $request['flags']=UploadImages::Flags($request['flags']);
            $request['flags']=$request['flags'];
        }else{
            $request['flags']='';
        }
        $request['post_content'] = $this->conImg($request['post_content'],1);

         if($request['image'])
            {
                $postdata['images']=UploadImages::UploadImage($request);
            }
       
 // dd($request['imagepics']);
        $request['post_title']=$request['post_title'];
        $request['subtitle']=$request['subtitle'];
        $request['seotitle']=$request['seotitle'];
        $request['seokeys']=$request['seokeys']?$request['seokeys']:$request['post_title'];
        $request['post_jstitle']= $this->UTF2UCS($request['post_title']);
        $request['views']=rand(300,630);
        $request['post_date']=date('Y-m-d H:i:s');
        $request['post_modified']=date('Y-m-d H:i:s');

         $category = Category::where('term_id',$request['term_id'])->first();
          if($category->parent !=0)
                $pterm_id = $category->parent;
           else
             $pterm_id = $request['term_id'];

         $request['pterm_id']=$pterm_id;
         $request['term_id']=$request['term_id'];

        if($id==2){
            $Archivearr = News::create($request->all());
            if($request['tags']){
                   $this->tagsCreate($Archivearr->id,$request['tags'],$request['term_id']);
                }
            return redirect(action('Admin\ArticleController@Keywords'))->with('success','添加文章成功');
        }
        else{
            $Archivearr = Project::create($request->all());
            return redirect(action('Admin\AdminController@ArticleInfos'))->with('success','添加文章成功');
        }    
            

            // $archDatas = array(
            //                 'id' => $Archivearr->id, 
            //                 'body' => $request['body'],    
            //           );
            //             ArchiveData::create($archDatas); 

           // auth('admin')->user()->notify(new ArticlePublishedNofication(Archive::latest() ->first()));
           
            // return redirect('admin.article.article'.$request['hdid']);

            
        
    }



    /**普通文档文档编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function KeywordsEdit($id,$id2)
    {

        if($id2==2){
            $topnavs = cache()->remember('new3sarcedittopnavsss_'.$id, 30, function() {
                return   Category::where('taxonomy','news')->get();
            });
             $articleinfos= News::find($id);
        }

        else{
            $topnavs = cache()->remember('arcedittopnavsss_'.$id, 30, function() {
                return   Category::where('taxonomy','category')->orderBy('term_group','asc')->get();
            });

             $articleinfos= Project::find($id);
        }    
        

        return view('admin.project.project_edit',compact('id','topnavs','articleinfos','id2'));
    }
//预览
    function KeywordsShow($id)
    {
        $articleinfos=Archive::find($id);
         $articleinfodatas=ArchiveData::find($id);
        return view('admin.project.project_show',compact('id','articleinfos','articleinfodatas'));
    }

    function KeywordsPost(Request $request,$id,$id2)
    {
         
          $category = Category::where('term_id',$request['term_id'])->first();
          if($category->parent !=0)
                $pterm_id = $category->parent;
           else
             $pterm_id = $request['term_id'];

            if($id > 130263)
                 $postdata['post_content'] = $this->conImg($request['post_content'],2);
            else    
                $postdata['post_content'] = $request['post_content'];
            $postdata['post_title'] = $request['post_title'];
            $postdata['post_jstitle']= $this->UTF2UCS($request['post_title']);
            $postdata['pterm_id'] = $pterm_id;
            $postdata['term_id'] = $request['term_id'];
            $postdata['status'] = $request['status'];
            $postdata['seotitle'] = $request['seotitle'];
            $postdata['seokeys'] = $request['seokeys'];
            $postdata['subtitle'] = $request['subtitle'];
         
            if($request['image'])
            {
                $postdata['images']=UploadImages::UploadImage($request);
               
            }elseif (isset($request['image']) && !empty($request['image']))
            {
                $postdata['images']=$request['image'];

            }


            if(isset($request['flags']))
                {
                     // $postdata['flags']=UploadImages::Flags($request['flags']);
                     $postdata['flags']=$request['flags'];
                }
            $postdata['post_modified'] = date('Y-m-d H:i:s');

            if($id2 ==2){
                News::where('ID',$id)->update($postdata);
                if($request['tags']){
                    Tags::where('object_id',$id)->delete();
                   $this->tagsCreate($id,$request['tags'],$postdata['term_id']);
                }

                return redirect('admin/article/keywords')->with('success','修改成功');
            }
            else{
                Project::where('ID',$id)->update($postdata);
                return redirect('admin/admin/article/infos')->with('success','修改成功');
            }    
                


             // $this->Termtags($request,$id);
            

    }

    function tagsCreate($id,$tags,$term_id)
    {
                $tagsarr = explode(',',$tags);
                $tagdata['object_id'] = $id; 
                $tagdata['term_id'] = $term_id; 
                foreach ($tagsarr as $k => $v) {
                   $tagdata['slug'] = strtolower(rawurlencode($v));
                   Tags::create($tagdata);
                }
    }



    public function pindex(Request $request)
    {

        $arguments=$request->all();
      
         if(!empty($request->status))
            $articles = Pnew::select('id','post_title','pid','post_date','status')->where('status',2) ;
         else
            $articles = Pnew::select('id','post_title','pid','post_date','status')->where('status',1) ; 

              
        if(!empty($request->start_at))
              $articles->where('post_date', '>',Carbon::parse($request->start_at));
        if(!empty($request->end_at))
              $articles->where('post_date', '<',Carbon::parse($request->end_at));    
         if(!empty($request->title))
            $articles->where('post_title','like','%'.$request->title.'%');
       
           
          $articles = $articles->orderBy('id','desc')->paginate(20);
      
        return view('admin.project.pnews_list',compact('articles','arguments'));
    }

    function PnewsEdit($id)
    {

        $articleinfos = Pnew::where('id',$id)->first();

        $ptitle = Project::where('ID',$articleinfos->pid)->first();
       
        return view('admin.project.pnews_edit',compact('articleinfos','id','ptitle'));

    }

    function PostPnewsEdit(Request $request,$id)
    {   
       //重复文档监测
        $post_xm = Project::where('post_title',$request['ptitle'])->first();

        $postdata['post_author'] = auth('admin')->user()->id;

        $postdata['post_content'] = $this->conImg($request['post_content'],1);

         if($request['image'])
            {
                $postdata['images']=UploadImages::UploadImage($request);
            }
        $postdata['post_title']=$request['post_title'];
        $postdata['status']=$request['status'];
        $postdata['seokeys']=$request['seokeys']?$request['seokeys']:$request['post_title'];
        $postdata['post_jstitle']= $this->UTF2UCS($request['post_title']);
        $postdata['post_modified']=date('Y-m-d H:i:s');
        $postdata['pterm_id']=$post_xm->pterm_id;
        $postdata['term_id']=$post_xm->term_id;
        $postdata['pid']=$post_xm->ID;
        Pnew::where('id',$id)->update($postdata);
        return redirect(action('Admin\ArticleController@pindex'))->with('success','修改项目文章成功');
           
            
    }   

     function PnewsCreate()
    {
        return view('admin.project.pnews_create');

    }

    function PostPnewsCreate(Request $request)
    {   
       //重复文档监测
            if(Pnew::where('post_title',$request['post_title'])->value('id'))
            {
                exit('标题重复，禁止发布');
            }
        $post_xm = Project::where('post_title',$request['ptitle'])->first();

      // dd(auth('admin')->user()->id);
        $request['post_author'] = auth('admin')->user()->id;

        $request['post_content'] = $this->conImg($request['post_content'],1);

         if($request['image'])
            {
                $postdata['images']=UploadImages::UploadImage($request);
            }
        $request['post_title']=$request['post_title'];
        $request['seokeys']=$request['seokeys']?$request['seokeys']:$request['post_title'];
        $request['post_jstitle']= $this->UTF2UCS($request['post_title']);
        $request['views']=rand(300,630);
        $request['post_date']=date('Y-m-d H:i:s');
        $request['post_modified']=date('Y-m-d H:i:s');
        $request['pterm_id']=$post_xm->pterm_id;
        $request['term_id']=$post_xm->term_id;
        $request['pid']=$post_xm->ID;
        $request['status']=$request['status'];
        $Archivearr = Pnew::create($request->all());
        return redirect(action('Admin\ArticleController@pindex'))->with('success','添加项目文章成功');
           
            
    }   


    public function PosttitleCheck(Request $request)
    {
        $titlearr=Project::where('post_title','list','%'.$request->input('title').'%')->count();
        // if (!$title)
        // {
        //     $title = $titlearr->post_title;
        // }else{
        //     $title = '无';
        // }
        return $titlearr?1:0;
    }
     
    function sltImg($str,$cz=1)
    {
        $save_path = $_SERVER ['DOCUMENT_ROOT'] . '/images/thread/';
        // 文件保存目录URL
        $save_url = '/images/thread/';
        $save_path = realpath ( $save_path ) . '/';
        // 图片存储目录
        $imgPath = $save_path . date ( "Y" ). "/". date ( "m" ). '/'. date ( "d" );
        $imgUrl = $save_url . date ( "Y" ). '/'. date ( "m" ). '/'. date ( "d" );
        // 创建文件夹
        // if (! is_dir ( $imgPath )) {
        //     @mkdir ( $imgPath, 0777 );
        // }
        if (!file_exists($imgPath)){
            mkdir($imgPath,0777,true);
        }
        $img_array = array();
        if($cz==3)
            $img_array = explode("\n",$str);
        if($cz==1)
            $img_array = array ($str);
        
        $count = count($img_array)-1;
        // 时间无限制
        set_time_limit ( 0 );
        $fileurl ='';
        foreach ( $img_array as $key => $value ) {
            if($cz ==1 || $cz ==3){
                if(strstr($value,'storage/uploads')===false){
                    $img = trim($value);
                  
                    $imgname = date ( "YmdHis" ) . '_' . rand ( 10000, 99999 ) . ".jpg" ;
                    // 保存到本地的实际文件地址（包含路径和名称）
                    $fileName = $imgPath . '/' . $imgname;
                    // 实际访问的地址
                   
                    if($cz==3 && $count>0){
                       
                            $fileurl .= $imgUrl . "/" . $imgname.',';
                    }
                    if($cz==3 && $count==0)
                        $fileurl .= $imgUrl . "/" . $imgname.',';
                     if($cz==1)
                            $fileurl = $imgUrl . "/" . $imgname;
                    
                   //  // 文件写入
                    ob_start();//打开输出
                    
                    readfile($img);//输出图片文件
                    $img = ob_get_contents();//得到浏览器输出
                    ob_end_clean();//清除输出并关闭
                    $size = strlen($img);//得到图片大小
                    $fp2 = @fopen($fileName, "a");
                    fwrite($fp2, $img);//向当前目录写入图片文件，并重新命名
                    fclose($fp2);
                    
                }
            }else{
                if(strstr($value,'storage/uploads')===false){
                    if(strstr($value,'/images/thread') ===false){

                        $img = trim($value);
                        
                        $imgname = date ( "YmdHis" ) . '_' . rand ( 10000, 99999 ) . ".jpg" ;
                        // 保存到本地的实际文件地址（包含路径和名称）
                        $fileName = $imgPath . '/' . $imgname;
                       //  // 实际访问的地址
                        $fileurl = '"'.$imgUrl . "/" . $imgname.'"';
                        
                       //  // 文件写入
                        ob_start();//打开输出
                        readfile($img);//输出图片文件
                        $img = ob_get_contents();//得到浏览器输出
                        ob_end_clean();//清除输出并关闭
                        $size = strlen($_SERVER ['DOCUMENT_ROOT'].$img);//得到图片大小
                        $fp2 = @fopen($fileName, "a");
                        fwrite($fp2, $img);//向当前目录写入图片文件，并重新命名
                        fclose($fp2);
                    }
                }
            }
            
            
        }

        return  $fileurl;
 
    }

    function KeywordsDelete($id,$id2)
    {
        if($id2 ==2){
            News::where('ID',$id)->delete();
            return redirect(action('Admin\ArticleController@Keywords'))->with('success', '删除成功');
        }
        elseif($id2 ==3){
            Pnew::where('ID',$id)->delete();
            return redirect(action('Admin\ArticleController@pindex'))->with('success', '删除成功');
        }
            
         else{
            Project::where('ID',$id)->delete();
            return redirect(action('Admin\AdminController@ArticleInfos'))->with('success', '删除成功');
         }   
       
   }
   /**等待审核的文档
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function KeywordsFenpei($id2)
    {
     
        $idarr = Input::get("idarr");
        $czid = Input::get("czid");
        if($czid==2 ){
            $tid = Input::get("tid");
            if($tid!=0){
                $category = Category::where('taxonomy','category')->where('term_id',$tid)->first();
                  if($category->parent !=0)
                        $pterm_id = $category->parent;
                   else
                     $pterm_id = $tid;
            }
                
        }
        if($idarr!=''){
            foreach ($idarr as $v){
                if($id2 ==2)
                    $Arc =  News::where('ID',$v);
                elseif($id2 ==3)
                    $Arc =  Pnew::where('id',$v);
                else    
                    $Arc =  Project::where('ID',$v);
                if($czid==1)
                    $Arc->update(['status'=>'1']);
                if($czid==2){
                    if($tid!=0)
                        $Arc->update(['pterm_id'=>$pterm_id,'term_id'=>$tid]);
                }
                if($czid==3)
                  $Arc->delete();
            }
        }
          if($id2==2)
                return redirect(action('Admin\ArticleController@Keywords'))->with('success','批量操作成功');
            elseif($id2==3)
                return redirect(action('Admin\ArticleController@pindex'))->with('success','批量操作成功');  
           else 
                return redirect(action('Admin\AdminController@ArticleInfos'))->with('success','批量操作成功');
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





    /**文档编辑提交处理
     * @param CreateArticleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostEdit(CreateArticleRequest $request,$id)
    {


        if(isset($request['flags']))
        {
            $request['flags']=UploadImages::Flags($request['flags']);
        }else{
            $request['flags']='';
        }
        if($request['image'])
        {

            $request['litpic']=UploadImages::UploadImage($request);
            if(empty($request['flags'])){
                $request['flags'].='p';
            }else{
                $request['flags'].=',p';
            }
        }elseif (isset($request['litpic']) && !empty($request['litpic']))
        {
            if($request['ycimage'])
                $request['litpic'] = $this->sltImg($request['ycimage'],1);
            else
                $request['litpic']=$request['litpic'];

        }elseif (preg_match('/<[img|IMG].*?src=[\' | \"](.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/i',$request['body'],$match)){
           
            if($request['ycimage'])//远程缩略图
                $request['litpic'] = $this->sltImg($request['ycimage'],1);
            else
                $request['litpic']=$match[1];    
            if(empty($request['flags']))
            {
                $request['flags'].='p';
            }else{
                $request['flags'].=',p';
            }

        }else{
            
            if($request['ycimage'])
                $request['litpic'] = $this->sltImg($request['ycimage'],1);
            else
            $request['litpic']='';
        }

         $request['editor'] = auth('admin')->user()->id;
        //$request['description']=(!empty($request['description']))?$request['description']:str_limit(mb_ereg_replace('^(　| )+','', preg_replace('/\r|\n/', '', trim(strip_tags(htmlspecialchars_decode($request['body']))))), $limit = 180, $end = '');
        //dd($request->all());
        //$request['description']=str_limit(str_replace(' ','',str_replace('&nbsp;','',mb_ereg_replace('^(　| )+','', preg_replace('/\r|\n/', '', trim(strip_tags(htmlspecialchars_decode($request['description']))))))), $limit = 180, $end = '');
        $request['description']=(!empty($request['description']))?str_limit($request['description'],180,''):str_limit(str_replace(['&nbsp;',' ','　',PHP_EOL],'',strip_tags(htmlspecialchars_decode($request['body']))), $limit = 180, $end = '');


        if (empty($request['imagepics']))
        {
            $request['imagepics']=' ';
        }
        if($request['ycimagepics'])
        {
            $ycimagepics = $this->sltImg($request['ycimagepics'],3);
            if($request['imagepics'])
                $request['imagepics'] = $request['imagepics'].$ycimagepics;
            else
                $request['imagepics'] = $ycimagepics;

        }
        

//dd($this->ImageInformation($request->input('body')));
        //$request['body']=str_replace(['&nbsp;'],'',$this->ImageInformation($request->input('body'),$request->input('shorttitle')?$request->input('shorttitle'):$request->input('brandname'),$request->input('title')));
        //$flags=array_unique(explode(',',Archive::where('id',$id)->value('flags')));
        //$request['flags']=implode(',',$flags);
        $request['body'] = $this->conImg($request['body'],2);
        if ($request->input('mid')==0)
        {

            $request['brandid']= !empty($request['bdname'])?Brandarticle::where('brandname','like','%'.$request['bdname'].'%')->value('id'):0;
            $request['brandid']=!empty($request['brandid'])?$request['brandid']:0;
           
            Archive::findOrFail($id)->update($request->all());
           
             return redirect('admin/article'.$request['hdid']);
            
        }
            
    }
    function ajaxSearchXm(Request $request)
    {   

        $post_title = $request->get('ptitle');
        $listxm =  Project::where('post_title',$post_title)->first();
        $data = '';
      if(count($listxm)>0)
        $data = '<font style="color:green;">项目存在</font>';
      else
        $data = '<font style="color:red;">项目不存在，请输入正确的项目名</font>';
        return $data;

    }
      
     
    /**图集上传处理
     * @param ImagesUploadRequest $request
     */
    function UploadImages(ImagesUploadRequest $request){
        UploadImages::UploadImage($request);
    }


    /**文章图片信息修改
     * @param $content
     * @param $title
     * @param $fulltitle
     * @return mixed
     */
    function ImageInformation($content,$title,$fulltitle)
    {
        preg_match('/<img.+(title=\".*?\").+>/i',$content,$match);
        if (empty($match))
        {
            return $content;
        }
        preg_match('/<img.+(alt=\".*?\").+>/i',$content,$match2);
        //dd($match2);
        if (empty($match2))
        {
            return $content;
        }

        $patterns=array();
        $replacement=array();
        $patterns[0]=$match[1];
        $patterns[1]=$match2[1];
        $title=empty($title)?$fulltitle:$title;
        $replacement[0]='title="'.$title.'"';
        $replacement[1]='alt="'.$title.'"';
        //dd($patterns[0]);
        $content=str_replace($patterns[0],$replacement[0],$content);
        $content=str_replace($patterns[1],$replacement[1],$content);
        return $content;
    }


    /**重复标题检测
     * @param Request $request
     * @return int
     */
    public function ArticletitleCheck(Request $request)
    {
        $title=Archive::where('title',$request->input('title'))->count();
        if (!$title)
        {
            $title=Brandarticle::where('title',$request->input('title'))->value('title');
            if (!$title)
            {
                $title=Production::where('title',$request->input('title'))->value('title');
            }
        }
        return $title?1:0;
    }
    function UTF2UCS($str)
        {

            $str = strtolower($str);
            $arr = preg_split('//u', $str, null, PREG_SPLIT_NO_EMPTY);
            foreach ($arr as &$v)
                $v = bin2hex(iconv('UTF-8', 'UCS-2', $v));

            return join(" ", $arr);

        }

}
