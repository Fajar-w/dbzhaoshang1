@extends('admin.layouts.admin_app')
@section('title')编辑项目文档@stop
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
        {{Form::model($articleinfos,array('route' =>array( 'pnes_edit','id'=>$id),'method' => 'post','files' => true,))}}

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
                                {{Form::label('post_title', '文章标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('post_title', null, array('class' => 'form-control','id'=>'post_title','placeholder'=>'文章标题'))}}
                                </div>
                            </div>
                           
                              <div class="form-group col-md-12">
                                {{Form::label('seokeys', 'seo关键字', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                                     <input class="form-control" id="seokeys" placeholder="seo关键字" name="seokeys" type="text" value="{{$articleinfos->seokeys}}">
                                </div>

                            </div>
                             <div class="form-group col-md-12">
                                {{Form::label('pid', '对应品牌名', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    <input class="form-control" id="ptitle" placeholder="对应品牌名" name="ptitle" type="text" value="{{$ptitle->post_title}}">
                                </div>
                                <div class="xmerror">
                                <span></span>
                                </div>

                            </div>


                            <div class="form-group col-md-12 ">
                                {{Form::label('status', '文章状态', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="radio col-md-4 col-sm-9 col-xs-12">

                                
                                 @if($articleinfos->status=="1")
                                        {{Form::radio('status', '1', true,array('class'=>'flat-red','checked'=>'checked'))}} 已审核
                                        {{Form::radio('status', '2', false,array('class'=>'flat-red'))}}未审核
                                    @else
                                        {{Form::radio('status', '1', true,array('class'=>'flat-red'))}} 已审核
                                        {{Form::radio('status', '2', false,array('class'=>'flat-red','checked'=>'checked'))}}未审核
                                    @endif
                               
                                  
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
                        <h3 class="timeline-header no-border"><a href="#">缩略图处理</a> 图片上传22</h3>
                        <div class="timeline-body">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                        
                                <img src="{{ $articleinfos->images }}" class="img-rounded img-responsive"/>
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
                            <script id="container" name="post_content" type="text/plain" style="height:500px" > {!! $articleinfos->post_content!!}</script>
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
        {!! Form::close() !!}
    </div>
    <button onsubmit="return false;" onclick="getLocalData ()" class="btn btn-md bg-green">恢复内容</button>


    </section>
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
            $('#datepicker').datepicker({
                autoclose: true,
                language: 'zh-CN',
                todayHighlight: true
            });

            //iCheck for checkbox and radio inputs
            $('.basic_info input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
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

