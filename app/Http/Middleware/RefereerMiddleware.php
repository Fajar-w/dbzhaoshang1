<?php

namespace App\Http\Middleware;

use Closure;

class RefereerMiddleware
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
         if ($request->session()->has('referer')) {
             return $next($request);
         }else{
                 $request->header();
                 $referer=$request->header('referer')?$request->header('referer'):$request->header('host');
                 $request->session()->put('referer', $referer);
                 return $next($request);
             }

         return $next($request);
     }
}
