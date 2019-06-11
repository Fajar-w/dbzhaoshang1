@extends('admin.layouts.admin_app')
@section('title')系统配置@stop
@section('head')
    <link href="/adminlte/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminlte//plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <!--<link href="/adminlte/plugins/summernote/summernote-bs3.css" rel="stylesheet">-->
    <link href="/adminlte/dist/css/fileinput.min.css" rel="stylesheet">
@stop
@section('content')
    <!-- row -->
    <div class="row">
        @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            @endif
        <form class="form-horizontal m-t-md" action="/admin/info" method="post">
                {!! csrf_field() !!}
     
                <input type="hidden" value="{{$infos->term_id}}" name ='term_id'>
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">

                <li>
                    <i class="fa fa-pencil-square bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:i')}}</span>

                        <h3 class="timeline-header"><a href="#">系统配置|</a> 按需填写</h3>

                        <div class="timeline-body basic_info">
                            <div class="form-group col-md-12">
                                {{Form::label('slug', '网站url', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('slug',$infos->slug, array('class' => 'form-control','id'=>'slug','placeholder'=>'网站url'))}}
                                </div>
                            </div>
                             <div class="form-group col-md-12">
                                {{Form::label('name', '网站名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('name',$infos->name, array('class' => 'form-control','id'=>'name','placeholder'=>'网站名称'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {{Form::label('seo_title', '站点标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('seo_title', $infos->seo_title, array('class' => 'form-control','id'=>'seo_title','placeholder'=>'站点标题'))}}
                                </div>
                            </div>
                            
                           

                     
                            <div class="form-group col-md-12">
                                {{Form::label('seo_keys', '关键字', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('seo_keys',$infos->seo_keys, array('class' => 'form-control','id'=>'seo_keys','placeholder'=>'站点关键词'))}}
                                </div>
                            </div>
                        
                           
                         
                        
                            <div class="form-group col-md-12">
                                {{Form::label('seo_des', '站点描述', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::textarea('seo_des',$infos->seo_des, array('class' => 'form-control col-md-10','id'=>'desrciption','rows'=>3,'placeholder'=>'站点描述'))}}
                                </div>
                            </div>
                       {{--  <div class="form-group col-md-12">
                                {{Form::label('moban', '模版', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('moban',$infos->moban, array('class' => 'form-control','id'=>'moban','placeholder'=>'模版'))}}
                                </div>
                            </div> --}}
                          
                        </div>
                 
                          <div class="timeline-footer">
                            <button type="submit"  class="btn btn-md bg-maroon">提交文档</button>
                        </div>
                    </div>
                </li>
             
            
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>

        </div>
        <!-- /.col -->
     
   </form>
    </div>
  
    @if(count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <!-- /.row -->

    </section>

@stop

@section('libs')
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>

    <!-- /Custom Notification -->
    <script src="/js/fileinput.min.js"></script>


