<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Admin;
use App\AdminModel\Role;
use App\AdminModel\AdminRole;
use App\AdminModel\Post;
use App\AdminModel\Project;
use App\AdminModel\Term;
use App\AdminModel\Category;
use App\Helpers\Common;
use App\Http\Requests\UserRegsiterRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\RolesRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input,Auth,DB;

class AdminController extends Controller
{
    protected $rolesRepository;
    public function __construct(RolesRepository $rolesRepository)
    {
        $this->middleware('auth.admin:admin');
        $this->rolesRepository = $rolesRepository;
       
    }

    /**后台用户列表
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

    /**后台用户注册
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function Register()
    {
        $roles = $this->rolesRepository->getRoles();
        return view('admin.user.adminregister',compact('adminlists','roles'));
          

    }

    /**后台用户注册处理
     * @param UserRegsiterRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostRegister(UserRegsiterRequest $request)
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

    // public function ArticleInfos(Request $request)
    // {
    //     //$tsp = TermRelationship::whereNull('taxonomy')->orderBy('object_id', 'desc')->take(2)->get();

    //   set_time_limit(0);
        
    //    // $tsp = Post::select('ID')->where('term_id','=',0)->where('post_type','!=','attachment')->where('post_mime_type','!=','image/jpeg')->where('ID','>=',130153)->take(4000)->get();
     
    //    // foreach ($tsp as $k => $v) {

    //    //     $tax = TermRelationship::select('term_taxonomy_id','object_id','taxonomy','parent')->where('object_id',$v->ID)->get();
    //    //     //dd($tax);
    //    //     foreach ($tax as $k2 => $v2) {
    //    //       if($v2->taxonomy=='category' && $v2->parent!=0){
    //    //       // dd($v2->object_id.'++'.$v2->term_taxonomy_id);
    //    //          Post::where('ID',$v2->object_id)->update(['term_id'=>$v2->term_taxonomy_id]);
    //    //        }else if($v2->taxonomy=='category' && $v2->parent==0){
    //    //           Post::where('ID',$v2->object_id)->update(['term_id'=>$v2->term_taxonomy_id]);
    //    //        }
    //    //     }
    //    // }

    //    $tsp = TermRelationship::select('term_taxonomy_id')->where('term_taxonomy_id','>=',180000)->where('term_id',0)->take(6000)->get();
    //    foreach ($tsp as $k => $v) {

    //        $tax = TermTaxonomy::select('term_taxonomy_id','term_id')->where('term_taxonomy_id',$v->term_taxonomy_id)->get();
    //        foreach ($tax as $k2 => $v2) {
    //           TermRelationship::where('term_id',$v2->term_id)->update(['term_taxonomy_id'=>$v2->term_taxonomy_id]);
    //        }
    //    }
          
    // }

    /**用户文档信息筛选
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function ArticleInfos(Request $request)
    {
        $topnavs = cache()->remember('arttopnavsds_', 30, function() {
            return   Category::where('taxonomy','category')->orderBy('term_group','asc')->get();
        });

         $typeid = str_replace("/","",$request->term_id);
        $topid = '';
        if($typeid)
            $topid =  Category::where('term_id', $typeid)->value('parent');



        $arguments=$request->all();
        $pterm_id = $term_id = '';
         if(!empty($request->status))
            $articles = Project::select('ID','post_title','pterm_id','term_id','post_date','status')->where('status',2) ;
         else
            $articles = Project::select('ID','post_title','pterm_id','term_id','post_date','status')->where('status',1) ; 

              
        if(!empty($request->start_at))
              $articles->where('post_date', '>',Carbon::parse($request->start_at));
        if(!empty($request->end_at))
              $articles->where('post_date', '<',Carbon::parse($request->end_at));    
        
         if(!empty($request->term_id))
         {

              if($topid==0){
                $articles->where('pterm_id',$request->term_id);
                $pterm_id = $request->term_id;
              }
                else{
                  $articles->where('term_id',$request->term_id);
                  $term_id = $request->term_id;
                }
         }
         if(!empty($request->title))
            $articles->where('post_title','like','%'.$request->title.'%');
       
           
          $articles = $articles->orderBy('ID','desc')->paginate(20);
            
        return view('admin.project.project_list',compact('articles','arguments','topnavs','pterm_id','term_id'));
    }

}
