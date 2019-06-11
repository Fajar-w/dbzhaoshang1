@extends('admin.layouts.admin_app')
@section('title') 属性添加@stop
@section('head')
<style>td.newcolor span a{color: #ffffff; font-weight: 400; display: inline-block; padding: 2px;} td.newcolor span{margin-left: 5px;}</style>
@stop
@section('content')
    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">属性添加</p>
                {!! Form::open(array('action' => 'Admin\AttributeController@create')) !!}
                <div class="form-group has-feedback">
                        <label>所属类型：</label>
                        <div class="input-group">
                            <select name="fxlg" class="input">
                                <option value="0">文章栏目</option>
                                <option value="1">品牌栏目</option>
                            </select>
                        </div>
                    </div>
                <div class="form-group has-feedback">
                    {{Form::text('title', null,array('class'=>'form-control','id'=>'title','placeholder'=>'属性描述：如：价格'))}}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {{Form::text('name', null,array('class'=>'form-control','id'=>'title','placeholder'=>'属性名：如：jiage'))}}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {{Form::text('pflg', null,array('class'=>'form-control','id'=>'pflg','placeholder'=>'排序'))}}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                        <label>展示方式：</label>
                        <div class="input-group">
                            <select name="fieldtype" class="input">
                                <option value="0">列表选择</option>
                                <option value="1">单行文本</option>
                                <option value="2">多行文本</option>
                                <option value="3">富文本编辑</option>
                            </select>
                        </div>
                    </div>
                 
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


