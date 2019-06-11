@extends('admin.layouts.admin_app')
@section('title')添加普通文档@stop
@section('head')
<link href="/adminlte/plugins/summernote/summernote.css" rel="stylesheet">
<link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
<link rel="stylesheet" href="/adminlte//plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
<link href="/adminlte/dist/css/fileinput.min.css" rel="stylesheet">
<link href="/adminlte/plugins/select2/select2.min.css" rel="stylesheet">
@stop
@section('content')
        <!-- row -->
<div class="row">
   <form class="form-horizontal m-t-md" action="/admin/pnews/create" method="post">
                {!! csrf_field() !!}
    <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">

                <li>
                    <i class="fa fa-pencil-square bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:i')}}</span>

                        <h3 class="timeline-header"><a href="#">项目文章基本信息|</a> 按需填写</h3>

                        <div class="timeline-body basic_info">
                            <div class="form-group col-md-12">
                                {{Form::label('post_title', '标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('post_title', null, array('class' => 'form-control','id'=>'post_title','placeholder'=>'标题'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {{Form::label('seotitle', '关键字', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                                     <input class="form-control" id="pid" placeholder="关键字" name="seotitle" type="text" >
                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                {{Form::label('pid', '对应品牌名', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('ptitle', null, array('class' => 'form-control','id'=>'ptitle','placeholder'=>'对应品牌名'))}}
                                </div>
                                <div class="xmerror">
                                <span></span>
                                </div>
                                   
                            </div>

                           {{--  <input type="hidden" name="pterm_id" value="{{$post_xm->pterm_id}}">
                            <input type="hidden" name="term_id" value="{{$post_xm->term_id}}"> --}}
                            <div class="form-group col-md-12 ">
                                {{Form::label('status', '文章状态', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="radio col-md-4 col-sm-9 col-xs-12">
                                
                                    {{Form::radio('status', '1', true,array('class'=>'flat-red','checked'=>'checked'))}} 已审核
                                    {{Form::radio('status', '2', false,array('class'=>'flat-red'))}}未审核

                                </div>

                            </div>
                         
                        </div>
                        <div class="timeline-footer">
                            <button class="btn btn-primary btn-xs">Read more</button>
                        </div>
                    </div>
                </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-photo bg-aqua"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{date('D M j')}}</span>
                    <h3 class="timeline-header no-border"><a href="#">缩略图处理</a> 图片上传</h3>
                    <div class="timeline-body">
                        {{Form::file('image',  array('class' => 'file col-md-10','id'=>'input-2','multiple data-show-upload'=>'false','data-show-caption'=>'true'))}}
                    </div>
                </div>
            </li>
            <!-- END timeline item -->

            <!-- timeline item -->
            <li>
                <i class="fa fa-file-text bg-maroon"></i>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>

                    <h3 class="timeline-header"><a href="#">文档处理</a>文章内容编辑</h3>

                    <div class="timeline-body">
                   @include('admin.layouts.ueditor')

                        <!-- 编辑器容器 -->
                        <script id="container" name="post_content" type="text/plain" ></script>
                        <!--<div style="display: none"><textarea  name="body" id="lawsContent"></textarea></div>-->
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
        <button onsubmit="return false;" onclick="getLocalData ()" class="btn btn-md bg-green">恢复内容</button>
@if(count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
<!-- /.row -->
<script>
    function getLocalData () {
        if(!ue.hasContents())
        {
            body=ue.execCommand( "getlocaldata" );
            ue.setContent(body);
        }

    }
</script>
@stop

@section('libs')
<!-- iCheck -->
<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })


</script>

<script>

    $(function () {
      
        $('.basic_info input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('.basic_info input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    
    });
</script>
<!-- /Custom Notification -->
<script src="/js/fileinput.min.js"></script>
 <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
<script src="/adminlte/plugins/select2/select2.full.min.js"></script>
 <script>

        $('.select2').select2();
        $(function () {
            $('#datepicker,#datepicker1').datepicker({
                autoclose: true,
                language: 'zh-CN',
                todayHighlight: true
            });
        });
    </script>
<script type="text/javascript">
$(function() {
    $('#ptitle').blur(function() {
        var ptitle = $("#ptitle").val();
       
      // alert(ptitle);
        $.ajax({
            url: '/admin/ajax/mjiansuoxm',
            type: 'get',
            dataType: 'html',
            data: '&ptitle=' + ptitle ,
            success: function(data) {
                var fmeat = $('.xmerror > span').eq(0);
               fmeat.html(data)

            },
            error: function() {}
        });
    });
});

</script>
@stop

