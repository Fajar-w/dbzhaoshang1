<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
// use App\Services\ActionLogsService;
use App\AdminModel\Rule;
use App\AdminModel\Admin;

class RbacAuth
{
    protected $actionLogsService;

    /**
     * RbacAuth constructor.
     * @param $actionLogsService
     */
    // public function __construct(ActionLogsService $actionLogsService)
    // {
    //     $this->actionLogsService = $actionLogsService;
    // }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**判断登录用户是否已经登录*/

        if(!Auth::guard('admin')->check())
        {
            return redirect()->route('/admin/login---/===');
        }
 

        /**记录用户操作日志**/
       // dd($request->method());
        // if(in_array($request->method(),['GET','POST','PUT','PATCH','DELETE']))
        // {
        //     $this->actionLogsService->mudelActionLogCreate($request);
        // }
//dd(\Route::currentRouteAction());
        $users =  cache()->remember('users_', 60, function(){
           return   Auth::user()->roles;
             
        });
        foreach ($users as $key => $value) {
            $role_id =  $value['id'];
        }

        $currentaction=\Route::currentRouteAction();
         //$currentaction=\Route::currentRouteName();

         $qxmenu =  cache()->remember('qxmenus_'.$role_id.$currentaction, 60, function() use($role_id,$currentaction){
           return   Rule::join('roleauths','rules.id','=','roleauths.rule_id')->where('roleauths.role_id',$role_id)->where('rules.status',1)->where('rules.route',$currentaction)->first();
             
        });
         if($qxmenu==''){
                  dd('对不起，你无权操作！请返回继续别的操作');
             }
       
       // dd($currentaction);
        $pbread=collect();

        $routeinfo=Rule::where('route',$currentaction)->first();
        if($routeinfo){
             $pbread =  cache()->remember('pbread_'.$routeinfo->parent_id."_", 60, function() use($routeinfo){
                  return Rule::where('status',1)->where('id',$routeinfo->parent_id)->select('id','name')->first();
            });
        }
       
        $menu =  cache()->remember('menu_'.$role_id."_", 60, function() use($role_id){
              return Rule::join('roleauths','rules.id','=','roleauths.rule_id')->where('roleauths.role_id',$role_id)->where('rules.parent_id',3)->where('rules.status',1)->orderBy('rules.sort', 'asc')->get();
        });

        // foreach ($menu as $item) {
        //     $item['submenu'] = Rule::join('roleauths','rules.id','=','roleauths.rule_id')->where('roleauths.role_id',$role_id)->where('rules.parent_id',$item->rule_id)->where('rules.status',1)->orderBy('rules.sort', 'asc')->get();
        // }
        //dd( $item['submenu']);
        view()->share('menu', $menu);
        view()->share('routeinfo', $routeinfo);
        view()->share('pbread', $pbread);
        return $next($request);


  //       if(!Auth::guard('admin')->user()->hasRule(\Route::currentRouteName()))
  //       {
  //           return viewError('你无权访问','admin.index');
  //       }
  // //dd('44');
  //       return $next($request);
    }

}
