@extends('admin.layouts.admin_app')
@section('title')添加关键词@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
         <div class="alert alert-warning alert-dismissable">
          添加关键词22
        </div>
        <div class="ibox-content">
            <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a>
            <a href="{{route('roles.index')}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 角色管理</button></a>
            <div class="hr-line-dashed m-t-sm m-b-sm"></div>
            <form class="form-horizontal m-t-md" action="/admin/article/keywords/create" method="post">
                {!! csrf_field() !!}
                 <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">要导入的关键词包：</label>
                    <div class="input-group col-sm-1">
                        <select class="form-control" name="typeid">
                            <option value="1">不选为默认分类</option>
                            @forelse($categorys as $v)   
                                    <option value="{{$v->id}}">{{$v->typename}}</option>
                            @empty @endforelse
                                        
    
                        </select>
                      
                    </div>
                </div>
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">输入关键词：</label>
                    <div class="input-group col-sm-3">
                        <textarea name="title" class="form-control" rows="20" cols="30" data-msg-required="请输入角色描述">{{old('remark')}}</textarea>
                    </div>
                </div>


               
                <div class="hr-line-dashed m-t-sm m-b-sm"></div>
                <div class="form-group">
                    <div class="col-sm-12 col-sm-offset-2">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;保 存</button>
                        <button class="btn btn-white" type="reset"><i class="fa fa-repeat"></i> 重 置</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection