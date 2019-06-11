@extends('admin.layouts.admin_app')
@section('title')单页修改@stop
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
        {{Form::model($linkarr,array('route' =>array( 'link_pupdate','id'=>$id),'method' => 'post','files' => true,))}}

        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">


                <li>
                    <i class="fa fa-pencil-square bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:i')}}</span>

                        
                        <div class="timeline-body basic_info">
                            <div class="form-group col-md-12">
                                {{Form::label('link_name', '名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('link_name', null, array('class' => 'form-control','id'=>'link_name','placeholder'=>'name'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {{Form::label('link_url', 'url', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('link_url', null, array('class' => 'form-control','id'=>'link_url','placeholder'=>'url'))}}
                                </div>
                            </div>

                            <div class="form-group col-md-12 ">
                                {{Form::label('link_visible', '状态', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="radio col-md-4 col-sm-9 col-xs-12">
                                
                                 @if($linkarr->link_visible=="P")
                                        {{Form::radio('link_visible', 'P', true,array('class'=>'flat-red','checked'=>'checked'))}} 已审核
                                        {{Form::radio('link_visible', 'L', false,array('class'=>'flat-red'))}}未审核
                                    @else
                                        {{Form::radio('link_visible', 'P', true,array('class'=>'flat-red'))}} 已审核
                                        {{Form::radio('link_visible', 'L', false,array('class'=>'flat-red','checked'=>'checked'))}}未审核
                                    @endif
                               
                                  
                                </div>

                            </div>
                           

                        </div>
                       
                    </div>
                </li>
                    <li>
                   
                    <div class="timeline-item">
  
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


    </section>

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

@stop

