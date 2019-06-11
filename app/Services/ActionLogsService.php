<?php
namespace App\Services;

use Auth;
use Route;
use Zhuzhichao\IpLocationZh\Ip;
use App\Repositories\RulesRepository;
use App\Repositories\ActionLogsRepository;

class ActionLogsService
{
    protected $rulesRepository;

    protected $actionLogsRepository;

    /**
     * ActionLogsService constructor.
     * @param $actionLogsRepository
     */
    public function __construct(RulesRepository $rulesRepository, ActionLogsRepository $actionLogsRepository)
    {
        $this->rulesRepository = $rulesRepository;

        $this->actionLogsRepository = $actionLogsRepository;
    }

    /**
     * 登录操作日志
     * @param $request
     * @return mixed
     */
    public function loginActionLogCreate($request,$status = false)
    {
        //获取当前登录管理员信息
        $admin = Auth::guard('admin')->user();

        $ip = $request->getClientIp();

        $address = Ip::find($ip);

        $action = $status ? "管理员: {$admin->name} 登录成功" : " 登录失败,登录的账号为：{$request->name}　密码为：{$request->password}";

        $data = [
            'ip'=> $ip,
            'address'=> $address[0].$address[1].$address[2],
            'action'=> $action,
        ];

        $datas['data'] = json_encode($data);
        $datas['type'] = 2;
        return $this->actionLogsRepository->create($datas);
    }


    /**
     * 后台操作日志
     * @param $request
     * @return mixed
     */
    public function mudelActionLogCreate($request)
    {
//         $path = Route::currentRouteName();

//         $rule = $this->rulesRepository->ByRoute($path);

//         if(is_null($rule)) return false;

//         //获取当前操作方法上级模块名称
       
//         // if($rule->parent_id != 0)
//         // {
//             $parent_rule = $this->rulesRepository->ById($rule->parent_id);
//        // }
//dd(\Request::getRequestUri()."++".$request->method() );
//getRequestUri
        //dd($request->method());
        $requesturi = \Request::getRequestUri();
        $wzid = substr($requesturi,strripos($requesturi,'/')+1);
        if(strstr($requesturi,'article/keywords/edit/') && $request->method()=='POST')
            $rulename = "编辑了id为：{$wzid} 的文章";
        elseif(strstr($requesturi,'admin/edit/') && $request->method()=='PUT')
            $rulename = "修改了id为：{$wzid} 的账户密码";
        elseif(strstr($requesturi,'admin/regsiter') && $request->method()=='POST')
            $rulename = "添加了新的账户 ";
        elseif(strstr($requesturi,'admin/delete/') && $request->method()=='GET')
            $rulename = "删除了id为：{$wzid} 的账户";
        elseif(strstr($requesturi,'article/keywords/delete/') && $request->method()=='GET')
            $rulename = "删除了id为：{$wzid} 的文章";
        elseif(strstr($requesturi,'article/keywords/fenpei/') && $request->method()=='POST')
            $rulename = "分配文章给指定用户";
        elseif(strstr($requesturi,'article/keywords/create') && $request->method()=='POST')
            $rulename = "批量导入了新的关键词";
        elseif(strstr($requesturi,'category/create') && $request->method()=='POST')
            $rulename = "添加了新的关键词包";
        elseif(strstr($requesturi,'category/delete/') && $request->method()=='POST')
            $rulename = "删除了id为：{$wzid} 关键词包";
        elseif(strstr($requesturi,'category/edit/') && $request->method()=='PUT')
            $rulename = "编辑了id为：{$wzid} 关键词包";
        elseif(strstr($requesturi,'actions/') && $request->method()=='GET')
            $rulename = "删除了id为：{$wzid} 日志";
        elseif(strstr($requesturi,'admin/admin/rules') && $request->method()=='POST')
            $rulename = "添加了新的权限";
        elseif(strstr($requesturi,'/admin/admin/rules/') && $request->method()=="DELETE")
            $rulename = "删除了id为：{$wzid} 权限";
        elseif(strstr($requesturi,'admin/admin/rules/') && $request->method()=="PATCH")
            $rulename = "编辑了id为：{$wzid} 权限";
        
        elseif(strstr($requesturi,'/admin/admin/roles/') && $request->method()=="DELETE")
            $rulename = "删除了id为：{$wzid} 角色";
        elseif(strstr($requesturi,'admin/admin/roles/') && $request->method()=="PATCH")
            $rulename = "编辑了id为：{$wzid} 角色";
        elseif(strstr($requesturi,'admin/roles/group-access/') && $request->method()=="POST" && substr_count($requesturi,'/')>3)
            $rulename = "给id为：{$wzid}的用户授权了新的权限";
        elseif(strstr($requesturi,'admin/admin/roles') && $request->method()=='POST')
            $rulename = "添加了新的角色";
        else
            return true;
        
        //获取当前登录管理员信息
        $admin = auth('admin')->user();

        $address = Ip::find($request->getClientIp());
      //  dd($admin );

        $action = "用户: {$admin->name} {$rulename}";

        $data = [
            'ip'=> $request->getClientIp(),
            'address'=> $address[0].$address[1].$address[2],
            'action'=> $action,
        ];

        $datas['admin_id'] = $admin->id;
        $datas['data'] = json_encode($data);
        $datas['type'] = 1;
        isset($admin->id) ? $datas['admin_id'] = $admin->id : null;
        return $this->actionLogsRepository->create($datas);
    }

    /**
     * 获取全部的操作日志
     * @return mixed
     */
    public function getActionLogs()
    {
        return $this->actionLogsRepository->getWithAdminActionLogs();
    }
}