<?php

namespace App\Http\Controllers\Pc;
use App\AdminModel\Category;
use App\AdminModel\Project;
use App\AdminModel\Tags;
use App\AdminModel\News;
use App\AdminModel\Spage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;


class WapListController extends Controller
{
    //
    public function __construct()
    {

    }
    public function listXm($page=1)
    {   
        $path = \Request::path();

            if(strstr($path,'xm')===false)
                return view('errors.m404');

                 $pagelists =  cache()->remember('wapllxiangmu_pagelist_'.$page, $this->times(), function () use ($page,$path) {
                    
                         $pagelists = Project::select('ID','post_content','post_title','images','subtitle','views','post_date','pterm_id','term_id')->where('status',1)->orderBy('ID','desc')->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);
                  if($path=='xm')
                   return $pagelists->setPath('/'.$path);
                 else
                  return $pagelists->setPath('/');
                });
               

            $total =  cache()->remember('wapxmtotal_'.$path, $this->times(), function () use ($pagelists) {
                    return $pagelists->total();
                });
          return view('wap.list_xm',compact('pagelists','total','path','page'));
    }
    public function index($path,$page=1)
    {   
            $lmarr =  cache()->remember('waplmarrs_'.$path, $this->times(), function () use ($path) {
                return Category::where('slug',$path)->where('parent',0)->first();
            });
      // dd($lmarr->term_id);
            if(empty($lmarr->term_id))
                return view('errors.m404');

            $arrTermid = $lmarr->term_id;
     
                 $pagelists =  cache()->remember('waplm_pagelists_'.$page.'_'.$path.'_'.$arrTermid, $this->times(), function () use ($arrTermid,$page,$path,$lmarr) {
                    if($lmarr->taxonomy=='news'){
                       // $pagelists = News::select('ID','post_content','post_title','images','subtitle','views','post_date')->where('pterm_id',$arrTermid)->where('status',1)->orderBy('ID','desc')->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);
  
                   }else{
                         $pagelists = Project::select('ID','post_title','images','subtitle','views','post_date')->where('pterm_id',$arrTermid)->where('status',1)->orderBy('ID','desc')->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);
                         return $pagelists->setPath('/'.$path);
                   }

                   
                });

                 

              $fpath = '';
              
        if($lmarr->taxonomy=='news'){

             $jmzs =  cache()->remember('jmzs_15', 60, function(){
                    return News::select('ID','post_title')->where('term_id','222218')->where('status',1)->orderBy('ID','desc')->take(15)->get();
              });
             $jmsj =  cache()->remember('jmsj_15', 60, function(){
                    return News::select('ID','post_title')->where('term_id','222219')->where('status',1)->orderBy('ID','desc')->take(15)->get();
              });
             return view('wap.list_news',compact('jmzs','lmarr','jmsj'));
            // return view('wap.list_news',compact('pagelists','lmarr','page','total'));
        }
            
        else{
          $total =  cache()->remember('waptotal_'.$path, $this->times(), function () use ($pagelists) {
                    return $pagelists->total();
                });
            
          return view('wap.list_product',compact('pagelists','lmarr','fpath','total','page'));
        }
            
             
    }

    public function flists($path,$fpath,$page=1)
    {   
       $lmarr =  cache()->remember('waplmarr_'.$fpath, $this->times(), function () use ($fpath) {
                 return Category::where('slug',$fpath)->where('parent','!=',0)->first();
            });
       
            if(empty($lmarr->term_id))
                return view('errors.m404');
              if($lmarr->parent==0)
                 return view('errors.m404');
       
            $arrTermid = $lmarr->term_id;
          
                 $pagelists =  cache()->remember('waplm_pagelists_'.$page.'_'.$path.'_'.$arrTermid, $this->times(), function () use ($arrTermid,$page,$path,$fpath,$lmarr) {
                   if($lmarr->taxonomy=='news'){
                        $pagelists = News::select('ID','post_content','post_title','images','subtitle','views','post_date')->where('status',1)->where('term_id',$arrTermid)->orderBy('ID','desc')->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);
                      }else{
                           $pagelists = Project::select('ID','post_title','images','subtitle','views','post_date')->where('status',1)->where('term_id',$arrTermid)->orderBy('ID','desc')->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);
                      }
                   return $pagelists->setPath('/'.$path.'/'.$fpath);
                });

              $total =  cache()->remember('waptotal_'.$path.'_'.$fpath, $this->times(), function () use ($pagelists) {
                    return $pagelists->total();

                });
              $zflmarr =  cache()->remember('wapzfl_'.$path, $this->times(), function () use ($lmarr) {
                 return Category::select('name','slug')->where('term_id',$lmarr->parent)->first();
            });
         if($lmarr->taxonomy=='news')
            return view('wap.list_news',compact('pagelists','lmarr','page','total','fpath','zflmarr'));
        else{
         
            
          return view('wap.list_product',compact('pagelists','lmarr','fpath','zflmarr','total','page'));
        }
            
           
             
    }

    public function tags($tags,$page=1)
    {   

        $slug = strtolower(rawurlencode($tags));
        $tagarr = Tags::where('slug',$slug)->first();
       
            if(empty($tagarr->term_id))
                return view('errors.m404');

                 $obidList =  cache()->remember('wapobidList_pagelist3s_'.$page.'_'.$tags, $this->times(), function () use ($slug,$page,$tags) {
                     $obidList = Tags::select('object_id')->where("slug", $slug)->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);
                     return $obidList->setPath('/tag'.'/'.$tags);
                    });

                    $wzid  = array();
                    $len = count($obidList);
                    foreach ($obidList as  $k=>$v) {
                          $wzid[] .= $v->object_id;  
                    }
                    $pagelists =  cache()->remember('waptags_pagelist5s_'.$page.'_'.$tags, $this->times(), function () use ($wzid) {
                        $pagelistsArr = Project::select('ID','post_content','post_title','images','subtitle','views','post_date','pterm_id','term_id')->where('status',1)->whereIn('ID',$wzid)->get();
                        if(count($pagelistsArr)==0){

                            $pagelistsArr = News::select('ID','post_content','post_title','images','subtitle','views','post_date','pterm_id','term_id')->where('status',1)->whereIn('ID',$wzid)->get();
                        }   
                        return $pagelistsArr;
                    });
                $total =  cache()->remember('total_'.$tags.'_'.$page, $this->times(), function () use ($obidList) {
                    return $obidList->total();

                });

                 //dd($pagelists);
          return view('wap.list_tags',compact('pagelists','tagarr','tags','obidList','total','page'));
             
    }

    public function about()
    {   
        $path = \Request::path();
      
        
         $abouts =  cache()->remember('wapabout_'.$path, $this->times(), function () use ($path) {
              return Spage::select('ID','post_content','post_title','subtitle')->where('post_name',$path)->first();
        });
        return view('wap.list_about',compact('path','abouts'));
             
    }

    public function jiansuo($page=0)
    {   
    
        $post_jstitle = Input::get("s");
        $post_jstitles = $this->UTF2UCS($post_jstitle);

       // DB::connection()->enableQueryLog();
        // $pagelists = Post::select('ID','post_content','post_title','images','subtitle')->where('post_type','post')->where('post_status','publish')->orwhere('post_jstitle','like',$post_jstitle.'%')->take(100)->get();
       
        $pagelists =  cache()->remember('wapjiansuo_'.$post_jstitles, $this->times(), function () use ($post_jstitles) {
            return Project::select(['ID','post_content','post_title','images','subtitle','views'])
                    ->whereRaw(DB::raw('MATCH(post_jstitle) AGAINST ("' . $post_jstitles . '")'))
                    ->where('status',1)
                    ->take(50)
                    ->get();
        });

                  //  var_dump(DB::getQueryLog());
            return view('wap.list_search',compact('pagelists','post_jstitle'));
             
    }

    public function ajaxSearch(Request $request)
    {   
       $subtitle = $request->get('subtitle');
       $term_id = $request->get('term_id');
       $pslug = $request->get('pslug');
       $pname = $request->get('pname');
       $lslug = $request->get('lslug');
       $lname = $request->get('lname');
        //$abouts =  cache()->remember('abouts_'.$path, $this->times(), function () use ($path) {
            $listxm =  Project::select('ID','post_content','post_title','images','subtitle')->where('subtitle',$subtitle.'万')->where('term_id',$term_id)->take(10)->get();
            $data = '';
            if($pslug)
               $confl = '<a href="/'.$pslug.'">'.$pname.'</a><a href="/'.$pslug.'/'.$lslug.'" target="_blank">'.$lname.'</a>';else
                $confl ='<a href="/'.$lslug.'" target="_blank">'.$lname.'</a>';
            foreach ($listxm as $k => $v) {
                $data .= '<li class="clearfix">
                    <div class="item-img fl"><a href="/'.$v->ID.'.html" target="_blank">
                            <img src="'.$v->images.'">
                    </a></div>
                    <div class="trade-rank-detail-con fl">
                    <div class="title"><a href="/'.$v->ID.'.html" target="_blank">'.$v->post_title.'</a></div>
                    <div class="company">'.str_replace("加盟","",$v->post_title).'</div>
                    <div class="con">'. str_replace("补充：{无}","",str_limit(strip_tags($v->post_content),150)) .'</div>
                    <div class="label clearfix">'.$confl.'</div>
                    </div>
                    <div class="trade-rank-enter fr">
                    <div class="money">
                    <div>投资额</div>
                    <span>'.$v->subtitle.'</span> </div>
                    <div class="trade-rank-enter-btn"><a href="#" rel="pop_msg" class="bpopup" data-brand="jicyigyxz">申请加盟</a></div>
                    <div class="more"><a href="/'.$v->ID.'.html" target="_blank">查看详情&gt;&gt;</a></div>
                    </div>
                </li>';
            }


      //  });
        return $data;
     
      
             
    }

    function times()
    {
            return mt_rand(20,30);
        
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
