<?php

namespace App\Http\Controllers\Mobile;
use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Ask;
use App\AdminModel\Brandarticle;
use App\AdminModel\Comtmessage;
use App\AdminModel\IndustryNew;
use App\AdminModel\Shopinfomation;
use App\Overwrite\Paginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListArticleController extends Controller
{

    /**关于我们等品牌封面类列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function AboutListIndex(Request $request)
    {
        $thistypeinfo=Arctype::findOrFail(Arctype::where('real_path',$request->path())->value('id'));
        if ($thistypeinfo->reid)
        {
            $sontypes=Arctype::where('reid',$thistypeinfo->reid)->orderBy('id','desc')->get();
        }else{
            $sontypes=Arctype::where('reid',$thistypeinfo->id)->orderBy('id','desc')->get();
        }
        return view('mobile.list_product',compact('thistypeinfo','sontypes'));
    }

    /**文档列表页
     * @param Request $request
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function NewsList(Request $request,$path='',$page=0)
    {
        $thistypeinfo=Arctype::findOrFail(Arctype::where('real_path',trim(preg_replace('#list_[0-9]+\.html#','',$request->path()),'/'))->value('id'));
        if ($thistypeinfo->reid)
        {
            $sontypes=Arctype::where('reid',$thistypeinfo->reid)->orderBy('id','desc')->get();
        }else{
            $sontypes=Arctype::where('reid',$thistypeinfo->id)->orderBy('id','desc')->get();
        }
        $carticles=Archive::whereIn('id',[1071,1178])->get();
        $pagelists=Archive::whereIn('typeid',Arctype::where('reid',$thistypeinfo->id)->pluck('id'))->orWhere('typeid',$thistypeinfo->id)->orderBy('id','desc')->paginate($perPage = 9, $columns = ['*'], $pageName = 'list_', $page);
        if (str_contains($pagelists->links(),'?'))
        {
            $pagelink=str_replace(['_='],'_',str_replace('?','/',$pagelists->links()));
            $pagelink=preg_replace('/list_([0-9]+)/','list_${1}'.'.html',$pagelink);
            $pagelink=preg_replace('#\/list_[0-9]+\.html\.html#','',$pagelink);
        }else{
            $pagelink=$pagelists->links();
        }
        return view('mobile.list_news',compact('thistypeinfo','sontypes','carticles','pagelists','pagelink'));
    }

    /**多层级文档列表分页
     * @param Request $request
     * @param $path
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function NewsListextend(Request $request,$path,$path2,$page=0)
    {
        $thistypeinfo=Arctype::findOrFail(Arctype::where('real_path',trim(preg_replace('#list_[0-9]+\.html#','',$request->getRequestUri()),'/'))->value('id'));
        if ($thistypeinfo->reid)
        {
            $sontypes=Arctype::where('reid',$thistypeinfo->reid)->orderBy('id','desc')->get();
        }else{
            $sontypes=Arctype::where('reid',$thistypeinfo->id)->orderBy('id','desc')->get();
        }
        $carticles=Archive::whereIn('id',[1071,1178])->get();
        $pagelists=Archive::whereIn('typeid',Arctype::where('reid',$thistypeinfo->id)->pluck('id'))->orWhere('typeid',$thistypeinfo->id)->orderBy('id','desc')->paginate($perPage = 9, $columns = ['*'], $pageName = 'list_', $page);
        if (str_contains($pagelists->links(),'?'))
        {
            $pagelink=str_replace(['_='],'_',str_replace('?','/',$pagelists->links()));
            $pagelink=preg_replace('/list_([0-9]+)/','list_${1}'.'.html',$pagelink);
            $pagelink=preg_replace('#\/list_[0-9]+\.html\.html#','',$pagelink);
        }else{
            $pagelink=$pagelists->links();
        }
        return view('mobile.list_news',compact('thistypeinfo','sontypes','carticles','pagelists','pagelink'));
    }

    /**产品及店面封面列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ProductListIndex(Request $request)
    {
        $thistypeinfo=Arctype::findOrFail(Arctype::where('real_path',$request->path())->value('id'));
        if ($thistypeinfo->reid)
        {
            $sontypes=Arctype::where('reid',$thistypeinfo->reid)->orderBy('id','desc')->get();
        }else{
            $sontypes=Arctype::where('reid',$thistypeinfo->id)->orderBy('id','desc')->get();
        }
        return view('mobile.list_product',compact('thistypeinfo','sontypes'));
    }

}

