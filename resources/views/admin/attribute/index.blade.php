@extends('admin.layouts.admin_app')
@section('title')  后台用户列表@stop
@section('head')
<style>td.newcolor span a{color: #ffffff; font-weight: 400; display: inline-block; padding: 2px;} td.newcolor span{margin-left: 5px;}</style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                  <div class="alert alert-warning alert-dismissable">
                后台用户列表
            </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            @endif
             @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            @endif
                <!-- /.box-header -->
                <div class="box-body">
                     @if(auth('admin')->user()->type!=3)
                      <a href="/admin/admin/regsiter" link-url="javascript:void(0)"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 添加用户</button></a>
                      @endif
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">#ID</th>
                            <th>用户名</th>
                            <th>账号</th>
                            <th>角色</th>
                            <th>创建时间</th>
                            <th>更改时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($adminlists as $adminlist)
                        <tr>
                            <td>{{$adminlist->id}}.</td>
                            <td>{{$adminlist->name}}</td>
                            <td>
                                @foreach($adminlist->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            </td>
                            <td>{{$adminlist->email}}</td>
                            <td>{{$adminlist->created_at}}</td>
                            <td>{{$adminlist->updated_at}}</td>
                            <td class="newcolor"><span class="badge bg-green"><a href="/admin/admin/edit/{{$adminlist->id}}">编辑</a></span> 
                             @if(auth('admin')->user()->type!=3)   
                              <span class="badge bg-red"><a href="/admin/admin/delete/{{$adminlist->id}}">删除</a> </span>
                              @endif
                            </td>
                        </tr>
                       @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {{--!! $adminlists->links() !!--}}
                </div>
            </div>
            <!-- /.box -->
        </div>

    </div>
    <!-- /.row -->
    <!-- /.content -->
@stop

@section('libs')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        });
        function AjDelete (id,node) {
            var id = id;
            var node=node;
            $.ajax({
                //提交数据的类型 POST GET
                type:"POST",
                //提交的网址
                url:"/admin/article/delete/"+id,
                //提交的数据
                data:{"id":id,'node':node},
                //返回数据的格式
                datatype: "html",    //"xml", "html", "script", "json", "jsonp", "text".
                success:function (response, stutas, xhr) {
                    $(".modal-s-m"+id+" .modal-body").html(response);
                    $("#btn-"+id).attr("disabled","disabled");
                }
            });
        }
    </script>
@stop


