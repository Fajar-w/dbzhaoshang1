<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/4/7
 * Time: 12:53
 */
namespace App;
use App\AdminModel\Arctype;
use Illuminate\Http\Request;

class Position{
    function Positions($path){
        if (preg_match('/([\d]+\.shtml)/',$path,$match))
        {
            $path=str_replace($match[0],'',$path);
        }
        preg_match('/(^[\/])[\w\/]+[^\/$]/',$path,$matches);
        if(!empty($matches)){
            $matches[0]=preg_replace('/\/page\/(\d+)/', '', $matches[0]);
            $typeinfos=Arctype::where('real_path',substr($matches[0],1,-1))->first();
            if(empty($typeinfos))
            {
                $typeinfos=Arctype::where('real_path',substr($matches[0],1))->first();
            }
        }else{
            preg_match('/(^[\/])[\w\/]+/',$path,$matches);
            $matches[0]=preg_replace('/page\/(\d+)\//', '', $matches[0]);

            $typeinfos=Arctype::where('real_path',substr($matches[0],1))->first();
        }
        return $typeinfos;

    }

    /**广告随机展现图
     * @return array
     */
    public function randomBanner()
    {
        $bannerLists=[
            '<a href="/hanshizhaji/27.shtml"><img src="/reception/images/temp/bn7.jpg" alt="oumuni韩式炸鸡"></a>',
            '<a href="/meishizhaji/8.shtml"><img src="/reception/images/temp/bn8.jpg" alt="德克士"></a>',
            '<a href="/hanshizhaji/21.shtml"><img src="/reception/images/temp/bn9.jpg" alt="韩式炸鸡"></a>',
        ];
        return $bannerLists;
    }
}