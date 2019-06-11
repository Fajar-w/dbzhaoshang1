<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input,Auth;

class AttributeController extends Controller
{

    /**字段列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function Index()
    {
       if(auth('admin')->user()->type==1)
            $adminlists=Admin::all();
       else
            $adminlists=Admin::where('id',auth('admin')->user()->id)->orderBy('id','desc')->get();
            return view('admin.user.adminlist',compact('adminlists'));
        
    }

    /**添加字段
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function create()
    {
        return view('admin.attribute.create'); 
    }

    /**添加字段数据
     * @param UserRegsiterRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostCreate(Request $request)
    {
        $request['password']=bcrypt($request['password']);

        $adminDatas = array(
                            
                            'name' => Input::get('name') ,
                            'email' => Input::get('email'),
                            'password' =>  $request['password'], 
                            'ip' => \Request::ip(),
                            'status' => '1', 
                            'type' =>Input::get('role_id'),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),    
                      );


        $admin_id = Admin::insertGetId($adminDatas);
        // foreach (Input::get('role_id') as $key => $value) {
             $adminroleDatas = array(
                            'admin_id' => $admin_id ,
                            'role_id' => Input::get('role_id'),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),    
                      );

            AdminRole::insert($adminroleDatas);
        // }

        return redirect(action('Admin\AdminController@Index'))->with('success', '添加成功');
    }

 

    /**后台用户编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function Edit($id)
    {
            $roles = $this->rolesRepository->getRoles();
           // $admin = $this->adminsService->ById($id);
          
            $adminUser = Admin::find($id);
            $ruleids = $adminUser->adminroles->pluck('role_id')->toArray();
            return view('admin.user.adminedit',compact('adminUser','roles','ruleids'));
        
    }

    /**后台用户编辑提交处理
     * @param UserRegsiterRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostEdit($id)
    {

        $password = Input::get('password') ;

                if($password=='')
                    $password = Admin::where('id','=', $id)->value('password');
                else
                    $password = bcrypt($password);


                $adminDatas = array(
                            'name' => Input::get('name') ,
                            'email' => Input::get('email'),
                            'password' =>  $password, 
                            'status' => Input::get('status'),
                            'ip' => \Request::ip(),
                            'type' =>Input::get('role_id'),
                            'updated_at' => date('Y-m-d H:i:s'),    
                      );
//dd($adminDatas);
        Admin::find($id)->update($adminDatas);
        // AdminRole::where('admin_id',$id)->delete();
        // foreach (Input::get('role_id') as $key => $value) {
             $adminroleDatas = array(
                            'role_id' => Input::get('role_id'),
                            'updated_at' => date('Y-m-d H:i:s'),    
                      );

            AdminRole::where('admin_id',$id)->update($adminroleDatas);
        // }

        return redirect(action('Admin\AdminController@Index'))->with('success', '修改成功');


        //dd($request->all());
        // Admin::find($id)->update($request->all());
        // return redirect(action('Admin\AdminController@Index'));
    }

    

    /**删除后台用户
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function Delete($id)
    {
        Admin::find($id)->delete();
        AdminRole::where('admin_id',$id)->delete();
        return redirect(action('Admin\AdminController@Index'))->with('success', '删除成功');
    }



    /**通知信息清除
     * @return \Illuminate\Http\RedirectResponse
     */
    public function NotificationClear()
    {
        $admin=Admin::find(auth('admin')->user()->id);
        $admin->unreadNotifications->markAsRead();
        return redirect()->back();

    }

    /**用户文档信息筛选
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleInfos(Request $request)
    {
        Admin::where('name',auth('admin')->user()->name)->value('type');
        $users=Admin::pluck('name','id');
        $arctypes=Arctype::pluck('typename','id');
        $arguments=$request->all();

        if ($request->advertisement==0)
        {
         
            $articles=Archive::when($request->name, function ($query) use ($request) {

            // return $query->where('dutyadmin',Admin::where('id',$request->name)->value('id'));
                return $query->where('dutyadmin',$request->name);

            })->when($request->start_at, function ($query) use ($request) {

            return $query->where('created_at', '>',Carbon::parse($request->start_at));

            })->when($request->end_at, function ($query) use ($request) {

            return $query->where('created_at', '<',Carbon::parse($request->end_at));

            })->when($request->ismake, function ($query) use ($request) {

            return $query->where('ismake',$request->ismake);

            })->when($request->title, function ($query) use ($request) {

            return $query->where('title','like','%'.$request->title.'%');

            })->when($request->typeid, function ($query) use ($request) {

            return $query->where('typeid',$request->typeid);

            });

            if(auth('admin')->user()->type!=3)
                $articles = $articles->orderBy('id','desc')->paginate(50);
            else
                 $articles = $articles->where('dutyadmin',auth('admin')->user()->id)->orderBy('id','desc')->paginate(50);


        }
        return view('admin.user.article_user_list',compact('users','articles','arguments','arctypes'));
    }

}
