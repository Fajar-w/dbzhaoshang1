@extends('admin.layouts.admin_app')
@section('title')添加普通文档@stop
@section('head')
<link href="/adminlte/plugins/summernote/summernote.css" rel="stylesheet">
<link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
<link rel="stylesheet" href="/adminlte//plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
<link href="/adminlte/dist/css/fileinput.min.css" rel="stylesheet">
@stop
@section('content')
        <!-- row -->
<div class="row">
   <form class="form-horizontal m-t-md" action="/admin/article/keywords/create{{$id}}" method="post">
                {!! csrf_field() !!}
    <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">

            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                     {{date("M j, Y")}}
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->

            
                <li>
                    <i class="fa fa-pencil-square bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:i')}}</span>

                        <h3 class="timeline-header"><a href="#">文章基本信息|</a> 按需填写</h3>

                        <div class="timeline-body basic_info">
                            <div class="form-group col-md-12">
                                {{Form::label('post_title', '文章标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('post_title', null, array('class' => 'form-control','id'=>'post_title','placeholder'=>'文章标题'))}}
                                </div>
                            </div>
                           
                            <div class="form-group col-md-12">
                                {{Form::label('subtitle', '投资金额', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                              <div class="col-md-4 col-sm-9 col-xs-12">
                                {{-- <input class="form-control" id="subtitle" placeholder="副标题" name="subtitle" type="text" >
                                   --}}   
                                     <select class="form-control select2" style="width: 100%" id="subtitle" name="subtitle">
                                        <option value="">请选择</option>
                                        <option value="0-1万">0-1万</option>
                                        <option value="1-5万">1-5万</option>
                                        <option value="5-10万">5-10万</option>
                                        <option value="10-20万">10-20万</option>
                                        <option value="20-50万">20-50万</option>
                                        <option value="50-100万">50-100万</option>
                                        <option value="100万以上">100万以上</option>
                                    </select>
                                                             
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">自定义文档属性</label>
                                <div class="checkbox" style="margin-top: 0px;">
                                    <label>
                                    {{Form::radio('flags', 'h', false,array('class'=>'flat-red'))}} 头条
                                    {{Form::radio('flags', 's', false,array('class'=>'flat-red'))}}图片
                                    {{Form::radio('flags', 'c', false,array('class'=>'flat-red'))}}推荐
                                    {{Form::radio('flags', 'f', false,array('class'=>'flat-red'))}}幻灯
                                    {{Form::radio('flags', 's', false,array('class'=>'flat-red'))}}滚动
                                    {{Form::radio('flags', 'a', false,array('class'=>'flat-red'))}}特荐
                                     
                                    </label>
                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                {{Form::label('seotitle', 'seo标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                                 <input class="form-control" id="seotitle" placeholder="seo标题" name="seotitle" type="text" >
                                </div>
                            </div>
                           
                            
                           
                          
                            <div class="form-group col-md-12 ">
                                {{Form::label('typeid', '所属栏目', array('class' => 'col-sm-2 control-label'))}}
                                
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                                   <select class="form-control select2" style="width: 100%" id="selectd" name='term_id'>
                                   
                                        @forelse($topnavs as $v)
                                             @if($v->parent==0)
                                                <option value="{{$v->term_id}}" @if($id==1 || $v->term_id==1) disabled @endif>{{$v->name}}</option>
                                                  @forelse($topnavs as $v2)
                                                   @if($v2->parent>0)
                                                        @if($v->term_id==$v2->parent)
                        <option value="{{$v2->term_id}}"> &nbsp;&nbsp;&nbsp;|---{{$v2->name}}</option>
                                                        @endif
                                                    @endif
                                                      @empty @endforelse
                                            @endif
                                              
                                        @empty @endforelse
                                        </select>
                                         </div>
                            </div>
                            {{-- <div class="form-group col-md-12 ">
                                {{Form::label('typeid', '所属品牌', array('class' => 'col-sm-2 control-label'))}}
                            
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                 <input class="form-control" id="menu_order" placeholder="所属品牌" name="menu_order" type="text">
                                </div>

                            </div>
                             --}}
                           <input type="hidden" name="pid" value=0>
                           

                            <div class="form-group col-md-12 ">
                                {{Form::label('status', '文章状态', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="radio col-md-4 col-sm-9 col-xs-12">
                                
                                    {{Form::radio('status', '1', true,array('class'=>'flat-red','checked'=>'checked'))}} 已审核
                                    {{Form::radio('status', '2', false,array('class'=>'flat-red'))}}未审核

                                </div>

                            </div>
                         
                             <div class="form-group col-md-12">
                                {{Form::label('seokeys', 'seo关键字', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                                     <input class="form-control" id="seokeys" placeholder="seo关键字" name="seokeys" type="text" >
                                </div>

                            </div>
                           @if(strstr(\Request::path(),'/create2'))
                            <div class="form-group col-md-12">
                                {{Form::label('tags', 'tag标签|多个标签请用英文逗号（,）分开', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                     <input class="form-control" id="tags" placeholder="tag标签" name="tags" type="text"">
                                </div>
                            </div>
                            @endif
                            <div class="form-group col-md-12 ">
                                {{Form::label('post_date', '预选发布时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="input-group date  col-md-4 col-sm-9 col-xs-12">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    
                                   <!--  {{Form::text('post_date', null, array('class' => 'form-control pull-right','id'=>'datepicker','placeholder'=>'点击选择时间'))}}
 -->
                                     <input class="form-control pull-right" id="post_date" placeholder="点击选择时间" name="post_date"  type="text">
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

{{-- <script language="javascript">


$('input[name="menu_order"]').blur(function(){
  var menu_order = $('input[name="menu_order"]').val()
  
  var cz = "/admin/article/titlecheck?title="+menu_order;

        $.ajax({
                    url: cz,
                    dataType: 'json',
                    method: 'GET',
                    success: function(data) {
                    if(data>=1)
                      {
                        alert('11');
                        return false;
                      }
                   },

               })
    })
</script>  --}} 
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
        // $('.basic_info input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        //     checkboxClass: 'icheckbox_minimal-blue',
        //     radioClass: 'iradio_minimal-blue'
        // });
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

