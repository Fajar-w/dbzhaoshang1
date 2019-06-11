<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Facades\Agent;
use Log;
class RedirectUrlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //部分强制跳转 最高优先级
        // if($request->path()=='brand' ||$request->path()=='blist')
        // {
        //     return redirect(config('app.url').'/pinpai/',301);
        // }
       
        // if($request->path()=='ilist' ||$request->path()=='item')
        // {
        //     return redirect(config('app.url').'/ilist/all/',301);
        // }
    
        //不带/跳转到带/

        if(preg_match('#(.*)/$#',$_SERVER['REQUEST_URI']) && (!str_contains($request->url(),'.html')))
        {
            if($_SERVER['REQUEST_URI']!='/')
                return redirect("http://".$_SERVER["HTTP_HOST"].substr($_SERVER['REQUEST_URI'],0,-1),301);
        }

          
        //移动适配跳转
        if (preg_match('#(.*)/$#',$_SERVER['REQUEST_URI']) && !str_contains($request->url(),'index.php') )
        {
            if ((str_contains($request->url(),'www.')) && Agent::isMobile())
            {
                if ($request->path()=='/')
                {
                    $redirecturl=str_replace('www.','m.',config('app.url').$_SERVER['REQUEST_URI']);
                }else{
                    $redirecturl=str_replace('www.','m.',config('app.url').'/index.php'.$_SERVER['REQUEST_URI']);
                }
                return redirect($redirecturl,302);
            }
        }
        
        //PC端清除index.php
        if (str_contains($request->url(),'http://www.') )
        {
            //dd($request->url());
            if (str_contains($request->url(),'index.php') )
            {

                $redirecturl=str_replace(['/index.php','/index.php/'],['','/'],$request->url()).'/';
                //dd($redirecturl);
                return redirect($redirecturl,301);
            }

        }
        //移动端强制index.php跳转
        elseif (str_contains($request->url(),'http://m.'))
        {

            if (str_contains($request->url(),'index.php') )
            {
                   

                $redirecturl=str_replace('www.','m.',config('app.url'));
               // dd($redirecturl);
                return redirect($redirecturl,301);
            }
        }
        // //mip强制index.php跳转
        // elseif (str_contains($request->url(),'https://mip.')){
        //     if ($request->url()==str_replace('www.','mip.',config('app.url')).'/index.php' || $request->url()==str_replace('www.','mip.',config('app.url')).'/index.php/')
        //     {
        //         $redirecturl=str_replace('www.','mip.',config('app.url'));
        //         return redirect($redirecturl,301);
        //     }elseif (!str_contains($request->url(),'index.php') && $request->url()!=str_replace('www.','mip.',config('app.url')))
        //     {
        //         $mobileurl=str_replace('https://www.','https://mip.',config('app.url'));
        //         $redirecturl=str_replace($mobileurl,$mobileurl.'/index.php',$request->url()).'/';
        //         //dd($redirecturl);
        //         return redirect($redirecturl,301);
        //     }
        // }

        return $next($request);
    }
}
