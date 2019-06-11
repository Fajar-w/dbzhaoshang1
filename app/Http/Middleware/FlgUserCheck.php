<?php

namespace App\Http\Middleware;

use Closure;

class FlgUserCheck
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
        if(auth('admin')->user()->flg !== 1){
            return redirect('/admin/index');
        }
        else
            return $next($request);
    }
}
