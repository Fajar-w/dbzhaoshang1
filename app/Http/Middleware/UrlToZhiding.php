<?php

namespace App\Http\Middleware;

use Closure;

class UrlToZhiding
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
       if(!str_contains(substr(\Request::getUri(),-1),'/')){

          
            if ((str_contains($request->url(),'phonecomplate')) || str_contains($request->url(),'captcha'))
            {
                return $next($request);
            }else{

                    preg_match('#(.*)[^/]$#',$_SERVER['REQUEST_URI'],$matches);
                    if (str_contains($request->url(),'www.'))
                    {
                        //$redirecturl=\Request::getUri().$matches[0].'/';
                        $redirecturl=\Request::getUri().'/';
                    }elseif (str_contains($request->url(),'m.')){
                       // $redirecturl=str_replace('www.','m.',\Request::getUri()).$matches[0].'/';
                         $redirecturl=str_replace('www.','m.',\Request::getUri()).'/';
                    }elseif (str_contains($request->url(),'mip.')){
                        // $redirecturl=str_replace('www.','mip.',\Request::getUri()).$matches[0].'/';
                        $redirecturl=str_replace('www.','mip.',\Request::getUri()).'/';
                    }
                        
                    return redirect($redirecturl,301);
                
            }

            
        }
       
        return $next($request);
    }
}
