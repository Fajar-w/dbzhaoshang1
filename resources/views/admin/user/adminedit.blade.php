@extends('admin.layouts.admin_app')
@section('title') 后台用户编辑@stop
    @section('head')
<style>td.newcolor span a{color: #ffffff; font-weight: 400; display: inline-block; padding: 2px;} td.newcolor span{margin-left: 5px;}</style>
@stop
@section('content')
    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">后台用户注册</p>
            {!! Form::model($adminUser,array('action' =>array('Admin\AdminController@Edit', $adminUser->id),'method' => 'put')) !!}
            <div class="form-group has-feedback">
                {{Form::text('name', null,array('class'=>'form-control','id'=>'name','readonly'=>'readonly','placeholder'=>'用户名'))}}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{Form::text('email', null,array('class'=>'form-control','id'=>'email','readonly'=>'readonly','placeholder'=>'登陆邮箱'))}}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{Form::password('password', array('class'=>'form-control','id'=>'password','placeholder'=>'密码(不修改不用动)'))}}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{Form::password('password_confirmation', array('class'=>'form-control','id'=>'password_confirmation','placeholder'=>'确认密码(不修改不用动)'))}}
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
 @if(auth('admin')->user()->type!=3)
            <div class="form-group has-feedback">
                        <label>所属角色：</label>
                        <div class="input-group">
                          
{{--                         @foreach($roles as $k=>$item)
                            <label><input type="checkbox" name="role_id[]" value="{{$item->id}}" @if(in_array($item->id,$ruleids)) checked="checked" @endif> {{$item->name}}</label><br/>
                        @endforeach
 --}}
                         <select class="form-control" name="role_id">
                                 @foreach($roles as $k=>$item)
                                    <option value="{{$item->id}}" @if(in_array($item->id,$ruleids))  selected="selected" @endif>{{$item->name}}</option>
                                @endforeach
                               
                            </select>

                        </div>
                    </div>

                     <div class="form-group  has-feedback">
                    <label>状态：</label>

                       @if($adminUser->status==0)
                          <input class="am-input-sm" type="radio"  name="status" value="0" checked> 锁定
                          <input class="am-input-sm" type="radio"  name="status" value="1"> 正常
                          @else
                          <input class="am-input-sm" type="radio"  name="status" value="0" > 锁定
                          <input class="am-input-sm" type="radio"  name="status" value="1" checked> 正常
                          @endif

                </div>
                @else
                <input type="hidden" name="role_id" value='{{$adminUser->type}}' >
                <input type="hidden" name="radio" value='{{$adminUser->status}}' >
                @endif
   
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">提交</button>
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}
            @if(count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
    <!-- /.row -->
    <!-- /.content -->
    @stop


