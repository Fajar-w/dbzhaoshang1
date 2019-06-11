<?php

namespace App\Http\Controllers\Mobile;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Ask;
use App\AdminModel\Brandarticle;
use App\AdminModel\Comtmessage;
use App\AdminModel\IndustryNew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class ArticleController extends Controller
{
    /**普通文档
     * @param Request $request
     * @param $path
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetArticles(Request $request,$path,$id)
    {
        $thisarticleinfos=Archive::findOrFail($id);
        $thistypeinfo=Arctype::findOrFail(Arctype::where('real_path',$path)->value('id'));
        if ($thistypeinfo->reid)
        {
            $sontypes=Arctype::where('reid',$thistypeinfo->reid)->orderBy('id','desc')->get();
        }else{
            $sontypes=Arctype::where('reid',$thistypeinfo->id)->orderBy('id','desc')->get();
        }
        $prev_article = Archive::latest('ismake',1)->find($this->getPrevArticleId($thisarticleinfos->id));
        $next_article = Archive::where('ismake',1)->find($this->getNextArticleId($thisarticleinfos->id));
        $published=$thisarticleinfos->created_at;
        DB::table('archives')->where('id',$id)->update(['click'=>$thisarticleinfos->click+1,'published_at'=>$published]);
        $xg_articles=Archive::where('typeid',$thistypeinfo->id)->take(10)->latest()->get();
        return view('mobile.article_article',compact('thisarticleinfos','prev_article','next_article','thistypeinfo','sontypes','xg_articles'));
    }

    /**上一篇
     * @param $id
     * @return mixed
     */
    protected function getPrevArticleId($id)
    {
        return Archive::where('id', '<', $id)->max('id');

    }

    /**下一篇
     * @param $id
     * @return mixed
     */
    protected function getNextArticleId($id)
    {
        return Archive::where('id', '>', $id)->min('id');

    }

}
