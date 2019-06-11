<?php

namespace App\Http\Controllers\Pc;
use App\AdminModel\Category;
use App\AdminModel\News;
use App\AdminModel\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WapIndexController extends Controller
{
    //
    public function __construct()
    {
       
    }
    public function Index()
    {
       
        $indexInfos = cache()->remember('indexInfos', 15000, function(){
            return Category::where('term_id',2)->first();
        });


 		// $arcArrleftgund = cache()->remember('indexArcArrleft5s_', $this->times(), function(){
   //          return Project::select('ID','post_title','images')->where('flags','s')->where('status',1)->take(5)->get();
   //      });

        
        $arcArrConTej = cache()->remember('indexarcArrConTej10s_', $this->times(), function(){
          return Project::select('ID','post_title','term_id','images','subtitle','views')->where('flags','a')->where('status',1)->take(8)->get();
        });


        // $chuanchuanxArc= cache()->remember('chuanchuanxArc7s_', $this->times(), function(){
        //   return Project::select('ID','post_title','post_content','post_date','images','subtitle')->where('term_id',25)->where('status',1)->orderBy('ID','desc')->take(7)->get();
        // });
        // $maocaiArc= cache()->remember('maocaiArc9s_', $this->times(), function(){
        //   return Project::select('ID','post_title','post_content','post_date','images','subtitle')->where('term_id',24)->where('status',1)->orderBy('ID','desc')->take(9)->get();
        // });

        $hyzsArc= cache()->remember('hyzsArc6s_', $this->times(), function(){
          return News::select('ID','post_title')->where('term_id',676)->where('status',1)->orderBy('ID','desc')->take(8)->get();
        });
        $cyglArc= cache()->remember('cyglArc6s_', $this->times(), function(){
          return News::select('ID','post_title')->where('term_id',677)->where('status',1)->orderBy('ID','desc')->take(8)->get();
        });


       
        return view('wap.index',compact('arcArrConTej','hyzsArc','cyglArc','indexInfos'));
    }
    function times()
    {
            return mt_rand(20,30);
        
    }

     public function clearCache()
    {
        
        cache()->flush();
        // abort(m404);
        return view('errors.m404');

    }

}
