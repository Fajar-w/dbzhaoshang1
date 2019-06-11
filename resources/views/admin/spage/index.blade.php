@extends('admin.layouts.admin_app')
@section('title')单页列表@stop
@section('content')
<div class="row">
     <?php
$urlstr = Request::getRequestUri();
        ?>
    <div class="col-sm-12">
         <div class="alert alert-warning alert-dismissable">
            单页列表
        </div>
        <div class="ibox-content">
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
            <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a> &nbsp;
             @if(auth('admin')->user()->type!=3)
            <a href="/admin/spage/create" link-url="javascript:void(0)"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 添加单页</button></a>
            @endif
            <table class="table table-striped table-bordered table-hover m-t-md">
                <thead>
                <tr>
                    <th class="text-center" width="100">ID</th>
                    <th>栏目</th>
                    <th>url</th>
                    <th class="text-center" width="100">状态</th>
                    <th class="text-center" width="300">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($spagearr as $key => $item)
                    <tr>
                        <td  class="text-center" >{{$item->ID}}</td>
                        <td>{{$item->post_title}}</td>
                        <td>{{$item->post_name}}</td>
                        <td class="text-center">@if($item->status==2) <font style="color: red;">待审核</font>@else <font style="color:green">已发布</font> @endif</td>
                        <td class="text-center">
                            <div class="btn-group">
                                
                                <a href="/admin/spage/edit/{{$item->ID}}"><button class="btn btn btn-warning btn-xs" type="button"><i class="fa fa-paste"></i> 修改</button></a>
                                 {{-- @if(auth('admin')->user()->type!=3)
                                <a href="/admin/spage/delete/{{$item->id}}">
                                <button class="btn btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i> 删除</button></a>
                                @endif --}}
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection