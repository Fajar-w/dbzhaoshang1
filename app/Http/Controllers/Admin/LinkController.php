<?php

namespace App\Http\Controllers\Admin;
use App\AdminModel\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth.admin:admin');
    }

    public function index(){
      
        $linkarr = Link::where('link_visible','!=','Y')->get();

        return view('admin.link.index',compact('linkarr'));

    }

    public function linkUpdate($id){
      
        $linkarr = Link::where('link_id',$id)->first();

        return view('admin.link.link_edit',compact('linkarr','id'));

    }

    public function linkPostUpdate(Request $request,$id){
        $postdata['link_url']=$request['link_url'];
        // $postdata['link_description']=$request['link_description'];
        $postdata['link_name']=$request['link_name'];
        $postdata['link_visible']=$request['link_visible'];
        $postdata['link_updated']=date('Y-m-d H:i:s');
        Link::where('link_id',$id)->update($postdata);
        return redirect(action('Admin\LinkController@index'))->with('success','编辑友链成功');
        
    }
    public function linkCreate(){
      
        return view('admin.link.create');

    }

    public function linkPostCreate(Request $request){
        $postdata['link_url']=$request['link_url'];
        // $postdata['link_description']=$request['link_description'];
        $postdata['link_name']=$request['link_name'];
        $postdata['link_visible']=$request['link_visible'];
        $postdata['link_updated']=date('Y-m-d H:i:s');
        Link::create($postdata);
        return redirect(action('Admin\LinkController@index'))->with('success','添加友链成功');
        
    }
    public function delete($id){
        Link::where('link_id',$id)->delete();
        return redirect(action('Admin\LinkController@index'))->with('success','删除友链成功');

    }



}
