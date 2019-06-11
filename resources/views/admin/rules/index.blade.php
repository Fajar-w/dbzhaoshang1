@extends('admin.layouts.admin_app')
@section('title')权限列表@stop
@section('head')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            系统权限菜单，非专业技术人员请勿修改、增加、删除等操作。
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
    </div>
</div>
<div class="row">
    <div class="col-sm-12">

        <div class="ibox-content">
            <a href="{{route('rules.create')}}" link-url="javascript:void(0)"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 添加权限</button></a>
            <table class="table table-striped table-bordered table-hover m-t-md">
                <thead>
                    <tr>
                        <th>权限名称</th>
                        <th>权限方法</th>
                        <th class="text-center" width="100">排序</th>
                        <th class="text-center" width="100">是否显示</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($rules as $k=>$item)
                <tr>
                    <td>{{$item['_name']}}</td>
                    <td>{{$item['route']}}</td>
                    <td class="text-center">{{$item['sort']}}</td>
                    <td class="text-center">
                        @if($item['is_hidden'] == 0)
                            <span class="text-navy">显示</span>
                        @else
                            <span class="text-danger">不显示</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route('rules.edit',$item['id'])}}">
                            <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 修改</button>
                        </a>&nbsp;&nbsp;
                        @if($item['is_hidden'] == 1)
                         <a href="/admin/admin/rules/status/0/{{$item['id']}}">
                             <button class="btn btn-info btn-xs" type="button"><i class="fa fa-warning"></i> 显示</button>
                         </a>&nbsp;&nbsp;
                        @else
                        <a href="/admin/admin/rules/status/1/{{$item['id']}}">
                            <button class="btn btn-warning btn-xs" type="button"><i class="fa fa-warning"></i> 不显示</button>
                        </a>&nbsp;&nbsp;
                        @endif
                        <form class="form-common" action="{{route('rules.destroy',$item['id'])}}" method="post" style="margin:0px;display:inline;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i> 删除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
</div>
@endsection