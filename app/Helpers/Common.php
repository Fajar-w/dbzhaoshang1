<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/2/24
 * Time: 16:02
 */
namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminModel\Term;
use App\AdminModel\Category;
use App\AdminModel\Project;
use App\AdminModel\Tags;
use App\AdminModel\News;
use App\AdminModel\Pnew;
use App\AdminModel\ApUpYunImg;

class Common
{
    
    

   public static  function invest($level)
{

    $level_cn = '';
    if($level == 9)
        $level_cn = '未知';
    else if($level == 1)
        $level_cn = '0万';
    else if($level == 2)
        $level_cn = '0-1万';
    else if($level == 3)
        $level_cn = '1-5万';
    else if($level == 4)
        $level_cn = '5-10万';
    else if($level == 5)
        $level_cn = '10-20万';
    else if($level == 6)
        $level_cn = '20-50万';
    else if($level == 7)
        $level_cn = '50-100万';
    else if($level == 8)
        $level_cn = '100万以上';
   
    return $level_cn;
    
}


    //留言
    public static function liuyan()
    {
        $provinces = [
            '湖南', '贵州', '广东', '河南', '河北', '山西', '浙江', '福建', '上海', '北京', '湖北', '江西', '广西', '黑龙江', '吉林',
        ];
        $telsH = [131, 134, 135, 136, 137, 138, 139, 147, 150, 152, 156, 170, 177, 180, 181, 186, 189];
        $sexs = ['先生', '女士'];
        $image = ['https://www.u88.com/public/images/portrait_boy.jpg','https://www.u88.com/public/images/portrait_girl.jpg'];
        $surnames = ['赵', '孙', '李', '周', '吴', '邓', '戴', '郭', '王', '易', '唐', '张', '刘'];
        $msgs = [
            '你好！我想加盟代理你们的品牌，请联系我。',
            '对该项目产生意向：我想知道加盟费用是多少。谢谢',
            '你们的总部在哪里部在哪里？',
            '我想加盟，请联系我。',
            '初步打算加入贵公司，请寄资料。',
            '你好！我想加盟代理你们的品牌，请联系我。',
            '请问店面面积需要多大？',
            '做为代理加盟商可以得到哪些支持?',
            '你们的产品经营方向是？',
            '你们用户的人群定位和发展规划是怎样的？',
            '加盟费用和初期投资多少，一般多久能收回成本？',
            '开店有什么支持？',
            '很想合作，来电话细谈吧。',
            '请问具体加盟流程是怎么样的?',
            '请问贵公司哪里有样板店或直营店？',
            '请给我打电话，并寄送加盟资料。',
            '你们的总部再哪里？',
            '请问店面面积需要多大？',
            '我想知道加盟费是多少，谢谢！',

        ];
        $liuyan = [];
        $start = time() - 28800;
        for ($i = 0; $i < 5; $i++) {
            $msg = collect();
            $msg->province = $provinces[rand(0, count($provinces) - 1)];
            $sex = rand(0, 1);
            $msg->image = $image[$sex];
            $msg->name = $surnames[rand(0, count($surnames) - 1)] . $sexs[$sex];
            $msg->msg = $msgs[rand(0, count($msgs) - 1)];
            $msg->time = date('m-d h:i', rand($start, $start + 2160));
            $msg->phone = $telsH[rand(0, count($telsH) - 1)] . '******' . rand(10, 99);
            $start += 1600;
            $liuyan[] = $msg;
        }

        return $liuyan;
    }

    public static function proMoren($id,$m)
    {
        return cache()->remember('proMoren_'.$id."_".$m, 120, function() use($m) {

             switch ($m) {
                case 1:
                    //意向\申请
                    return rand(612,1286);
                case 2:
                    //好评
                    return rand(90,99);
                case 3:
                    //加盟店
                     return rand(63,683);       
               case 4:
                    return date('Y-m-d',rand(663128640, 1483669440));  
               
            }
           
        });
        
    }

    function randomDate($begintime, $endtime="", $now = true) {
        $begin = strtotime($begintime);  
        $end = $endtime == "" ? mktime() : strtotime($endtime);
        $timestamp = rand($begin, $end);
        return $now ? date("Y-m-d H:i:s", $timestamp) : $timestamp;          
    }

    public static function getLanmus($limit)
    {

        return cache()->remember('headgetLanmusss_'.$limit, 120, function() use($limit) {
            return Category::where('parent',0)->orderBy('term_group')->take($limit)->get();
           
        });
        
    }
    public static function getLanmus2($termid)
    {
        return cache()->remember('getLanmus2_'.$termid, 30, function() use($termid){
            return Category::where('parent',$termid)->get();
           
        });
        
    }

    public static function getLanmuZls($termid,$name)
    {
        return cache()->remember('getLanmuZlss_'.$termid.'_'.$name, 30, function() use($termid,$name){
            return Category::where('term_id',$termid)->value($name);
           
        });
        
    }

    public static function getLanmufls($termid)
    {
        return cache()->remember('getLanmuflss_'.$termid, 30, function() use($termid){
            return Category::where('term_id',$termid)->first();
           
        });
        
    }

    // public static function getMetas($postid,$metakey)
    // {
    //     return cache()->remember('getMetas_'.$postid."_".$metakey, 30, function() use($postid,$metakey) {
           
    //         $postmates =  PostMeta::where('post_id',$postid)->where('meta_key',$metakey)->value('meta_value');

    //         if(empty($postmates))
    //             return '';
    //         else
    //             return $postmates;
           
    //     });
        
    // }
    public static function getPostTags($objectid)
    {
        // return cache()->remember('getPostTags_'.$objectid, 5, function() use($objectid) {
            $object_idarr =  Tags::where('object_id',$objectid)->get();
           
             $sname ='';
             $slen = count($object_idarr);
            if($slen > 0){
                foreach ($object_idarr as $k => $v) {
                    if($k < $slen-1)
                        $sname .= rawurldecode(strtolower($v->slug)).',';
                    else
                        $sname .= rawurldecode(strtolower($v->slug));
                }
            }
           return $sname;
        // });
        
    }

    public static function getApupyunimgs($id,$str='upyun_key',$limit =1)
    {
        return cache()->remember('getApupyunimgs_'.$id, 30, function() use($id,$str,$limit){
            return ApUpYunImg::where('id',$id)->take($limit)->value($str);
           
        });
        
    }
    public static function getPosts($term_id,$str,$limit=10)
    {
        //where('post_type','post')->where('post_status','publish')->
        return cache()->remember('getPost3sss_'.$term_id."_".$limit, 60, function() use($term_id,$limit,$str){
            if($term_id == '-1'){
                return Project::select('ID','post_title','post_date','images','subtitle','views')->where('status',1)->orderBy('ID','desc')->take($limit)->get();
            }elseif($term_id == '-2'){
                return Project::select('ID','post_title','post_date','images','subtitle','views')->where('status',1)->whereNotNull('subtitle')->orderBy('views','desc')->take($limit)->get();
            }elseif($term_id == '-3'){
                return Project::select('ID','post_title','post_date','images','subtitle','views')->where('status',1)->orderBy('post_jstitle','desc')->take($limit)->get();
            }elseif($term_id == '-4'){
                return Project::select('ID','post_title','post_date','images','subtitle','views')->where('status',1)->where('flags','c')->where('pterm_id','!=',1)->take($limit)->get();
            }else{
               if($str){
                    return Project::select('ID','post_title','post_date','images','subtitle','views')->where('status',1)->where('flags',$str)->where('pterm_id',$term_id)->take($limit)->get();
                }else{
                    return Project::select('ID','post_title','post_date','images','subtitle','views')->where('status',1)->where('pterm_id',$term_id)->orderBy('ID','desc')->take($limit)->get();
                }
            }    
           
           
        });
    }

    public static function getPnews($pid,$limit=10)
    {
        return cache()->remember('getpnews_'.$pid."_".$limit, 60, function() use($pid,$limit){
            return Pnew::select('id','post_title','post_date')->where('pid',$pid)->where('status',1)->orderBy('id','desc')->take($limit)->get();
        });
    }
    public static function getNews($term_id,$limit=10)
    {
        //where('post_type','post')->where('post_status','publish')->
        return cache()->remember('getNew1s_'.$term_id."_".$limit, 60, function() use($term_id,$limit){
            if($term_id == '-1'){
                return News::select('ID','post_title','post_date','images','subtitle','views')->where('status',1)->orderBy('views','desc')->take($limit)->get();
            }elseif($term_id == '-2'){
                return Project::select('ID','post_title','post_date','images','subtitle','views')->where('status',1)->where('flags','a')->take($limit)->get();
            }else{
                return News::select('ID','post_title','post_date','images','subtitle','views')->where('term_id',$term_id)->where('status',1)->orderBy('ID','desc')->take($limit)->get();
            }
           
           
           
        });
    }


     public static function hiddenNews($term_id,$limit=6)
    {
        //where('post_type','post')->where('post_status','publish')->
        return cache()->remember('getNew3sss_'.$term_id."_".$limit, 3600, function() use($term_id,$limit){
            if($term_id == '-1'){
                return Project::select('ID','post_title')->where('status',1)->orderBy('ID','desc')->take($limit)->get();
            }elseif($term_id == '-2'){
                 return Category::where('parent',0)->orderBy('term_group')->take($limit)->get();
            }elseif($term_id == '-3'){
                return Project::select('ID','post_title')->where('status',1)->inRandomOrder()->take($limit)->get();
            }elseif($term_id == '-4'){
                return Project::select('ID','post_title')->where('status',1)->orderBy('views','desc')->take($limit)->get();
            }elseif($term_id == '-5'){
                return News::select('ID','post_title')->where('status',1)->orderBy('views','desc')->take($limit)->get();
            }
            else{
                return Project::select('ID','post_title')->where('status',1)->inRandomOrder()->take($limit)->get();
            }
        });
    }

    public static function getPoststaglist($id)
    {
        return cache()->remember('getPoststaglistss'.$id, 60, function() use($id){
            return Project::select('ID','post_title','post_date','images','subtitle','post_content','views')->where('ID',$id)->first();
        });
    }

    public static function arctypeTopid($term_id)
    {
         $idarr = cache()->remember('arctypeTopid3s_'.$term_id, 1000, function() use ($term_id){
            return Category::select('term_id','parent','slug','name','description')->where('parent',$term_id)->orderBy('term_group','asc')->get();

         });
        return $idarr;
    }


    public static function xmgetcate($pterm_id,$term_id)
    {
         $idarr = cache()->remember('xmgetcates_'.$pterm_id.$term_id, 1000, function() use ($pterm_id,$term_id){
                $pcate =  Category::select('term_id','parent','slug','name','description')->where('term_id',$pterm_id)->first();
                $zcate =  Category::select('term_id','parent','slug','name','description')->where('term_id',$term_id)->first();
                return "<a href='/".$pcate->slug."'>".$pcate->name."</a><a href='/".$pcate->slug."/".$zcate->slug."'>".$zcate->name."</a>";

         });
            
        return $idarr;
    }

    public static function getIdPostTags($id)
    {
        return cache()->remember('getIdPostTags_'.$id, 60, function() use($id) {
            return Tags::where('object_id',$id)->get();
        });
    }

    // public static function getIdPostTags2($id)
    // {
    //      return cache()->remember('getIdPostTags2_'.$id, 60, function() use($id) {
    //         $tags = Term::select('name','slug')->where('term_id',$id)->where('taxonomy','post_tag')->first();
    //        // dd($tags);
    //         return '<a href="/tag/'.$tags->slug.'" rel="tag">'.$tags->name.'</a>';
       
    //      });
        
    // }

    public static function HotgetTags()
    {
         return cache()->remember('HotgetTags_', 60, function(){
            return Tags::select('name','slug')->where('taxonomy','post_tag')->inRandomOrder()->take(30)->get();
         });
        
    }



}