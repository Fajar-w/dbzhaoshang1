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
    {{Form::open(array('route' => 'article_create','files' => true,))}}
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
                        <div class="form-group col-md-12" id="checktitle">
                            {{Form::label('title', '文章标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="col-md-4 col-sm-9 col-xs-12 ">
                                {{Form::text('title', null, array('class' => 'form-control','id'=>'title','placeholder'=>'文章标题'))}}
                                <span class="help-block" style="display: none;"><i class="fa fa-bell-o"></i>标题已存在,请勿提交重复标题</span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-2 col-sm-3 col-xs-12 control-label">自定义文档属性</label>
                            <div class="checkbox" style="margin-top: 0px;">
                                <label>
                                    {{Form::checkbox('flags[]', 'h',false,array('class'=>'flat-red'))}} 头条
                                </label>
                                <label>
                                    {{Form::checkbox('flags[]', 'p',false,array('class'=>'flat-red'))}} 图片
                                </label>
                                <label>
                                    {{Form::checkbox('flags[]', 'c',false,array('class'=>'flat-red'))}} 推荐
                                </label>
                                <label>
                                    {{Form::checkbox('flags[]', 'f',false,array('class'=>'flat-red'))}} 幻灯
                                </label>
                                <label>
                                    {{Form::checkbox('flags[]', 's',false,array('class'=>'flat-red'))}} 滚动
                                </label>
                                <label>
                                    {{Form::checkbox('flags[]', 'a',false,array('class'=>'flat-red'))}} 特荐
                                </label>
                            </div>

                        </div>
                        <div class="form-group col-md-12">
                            {{Form::label('shorttitle', '简略标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                {{Form::text('shorttitle',null, array('class' => 'form-control','id'=>'shorttitle','placeholder'=>'短标题'))}}
                            </div>
                        </div>

                        <div class="form-group col-md-12" style="display: none;">
                            {{Form::label('tags', 'tag标签', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                {{Form::text('tags', null, array('class' => 'form-control','id'=>'tags','placeholder'=>'文档tag标签'))}}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            {{Form::label('keywords', '关键字', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                {{Form::text('keywords',null, array('class' => 'form-control','id'=>'keywords','placeholder'=>'文档关键词'))}}
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="display: none;">
                            {{Form::label('bdname', '所属品牌', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                {{Form::text('bdname',null, array('class' => 'form-control','id'=>'keywords','placeholder'=>'所属品牌'))}}
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="display: none;">
                            {{Form::label('country', '地区信息', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                {{Form::text('country',null, array('class' => 'form-control col-md-10','id'=>'country','placeholder'=>'填写地区名称即可'))}}
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="display: none;">
                            {{Form::label('bdxg_search', '百度相关搜索', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                {{Form::text('bdxg_search', null, array('class' => 'form-control col-md-10','id'=>'bdxg_search','placeholder'=>'百度相关搜索'))}}
                            </div>
                        </div>
                        <div class="form-group col-md-12 ">
                            {{Form::label('typeid', '文章所属栏目', array('class' => 'col-sm-2 control-label'))}}
                            <div class="col-sm-5">
                             
                                <select class="form-control select2" style="width: 78%" id="selectd" name="typeid" required>
                                        @forelse($categorys as $v)
                                        @if($v->cid==0)
                                            @if( $v->mid==0 && $v->topid==$id)
                                                <option value="{{$v->id}}" >{{$v->typename}}</option>
                                                  @forelse($categorys as $v2)
                                                    @if($v->id==$v2->topid)
                    <option value="{{$v2->id}}" > &nbsp;&nbsp;&nbsp;|---{{$v2->typename}}</option>
                                                    @endif
                                                  @empty @endforelse
                                             @endif 
                                        @endif   
                                        @empty @endforelse
                                        </select>
                            </div>
                        </div>

                         <div class="form-group col-md-12 ">
                            {{Form::label('pid', '所属分类'.$id, array('class' => 'col-sm-2 control-label'))}}
                            <div class="col-sm-5">
          
                                <select class="form-control select2" style="width: 78%" id="selectd" name="pid" required>
                                   
                                        @forelse($categorys as $v)
                                        @if($v->cid!=0 && $v->cid!=18)
                                            @if($v->mid==0 && $v->id==$id)
                                                <option value="{{$v->id}}" selected="selected">{{$v->typename}}</option>
                                             @else
                                              <option value="0">请选择分类（不选为餐饮加盟分类）</option>
                                             @endif 
                                        @endif   
                                        @empty @endforelse
                                        
                                        </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12 ">
                            {{Form::label('original', '原创提交', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="radio col-md-4 col-sm-9 col-xs-12">
                                {{Form::radio('original', '1', true,array('class'=>'flat-red'))}} 是
                                {{Form::radio('original', '0', false,array('class'=>'flat-red'))}}否
                            </div>

                        </div>
                       <!--  <div class="form-group col-md-12 ">
                            {{Form::label('xiongzhang', '熊掌号推送', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="radio col-md-4 col-sm-9 col-xs-12">
                                {{Form::radio('xiongzhang', '1', false,array('class'=>'flat-red'))}} 熊掌号实时推送
                                {{Form::radio('xiongzhang', '0', true,array('class'=>'flat-red'))}}熊掌号历史推送
                            </div>
                        </div> -->
                        <div class="form-group col-md-12">
                            {{Form::label('description', '文档描述', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                {{Form::textarea('description',null, array('class' => 'form-control col-md-10','id'=>'desrciption','rows'=>3,'placeholder'=>'不填写将自动提取首段'))}}
                            </div>
                        </div>
                        <div class="form-group col-md-12 ">
                            {{Form::label('ismake', '文章状态', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="radio col-md-4 col-sm-9 col-xs-12">
                                 @if(auth('admin')->user()->flg==1)
                                {{Form::radio('ismake', '1', true,array('class'=>'flat-red'))}} 已审核
                                {{Form::radio('ismake', '0', false,array('class'=>'flat-red'))}}未审核
                                @else
                                 {{Form::radio('ismake', '0', true,array('class'=>'flat-red'))}}未审核
                                @endif
                            </div>

                        </div>
                        <div class="form-group col-md-12 ">
                            {{Form::label('published_at', '预选发布时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                            <div class="input-group date  col-md-4 col-sm-9 col-xs-12">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {{Form::text('published_at', \Carbon\Carbon::now(), array('class' => 'form-control pull-right','id'=>'datepicker','placeholder'=>'点击选择时间'))}}
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
                    <input class="form-control"  placeholder="远程图片地址，不是远程不用填写.例如：http://www.ysg.cn/images/1.jpg" name="ycimage" type="text">
                    </div>
                    <div class="timeline-body">
                        {{Form::file('image',  array('class' => 'file col-md-10','id'=>'input-2','multiple data-show-upload'=>'false','data-show-caption'=>'true'))}}

                        <input  id="hdid" name="hdid" type="hidden" value="{{$id}}">
                    </div>
                </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li style="display: none">
                <i class="fa fa-user bg-yellow"></i>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">产品信息</a> 产品信息描述</h3>

                    <div class="timeline-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {{Form::label('brandname', '品牌名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandname',null, array('class' => 'form-control col-md-10','id'=>'brandname','disabled'=>'disabled','placeholder'=>'品牌名称'))}}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                {{Form::label('brandtime', '成立时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandtime', null, array('class' => 'form-control col-md-10','id'=>'brandtime','disabled'=>'disabled','placeholder'=>'1970-1-1'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandorigin', '品牌发源地', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandorigin', null, array('class' => 'form-control col-md-10','id'=>'brandorigin','disabled'=>'disabled','placeholder'=>'品牌发源地'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandnum', '门店总数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandnum', null, array('class' => 'form-control col-md-10','id'=>'brandnum','disabled'=>'disabled','placeholder'=>'门店总数'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandpay', '加盟费用', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandpay', null, array('class' => 'form-control col-md-10','id'=>'brandpay','disabled'=>'disabled','placeholder'=>'加盟费用'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandarea', '加盟区域', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandarea', null, array('class' => 'form-control col-md-10','id'=>'brandarea','disabled'=>'disabled','placeholder'=>'加盟区域'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandmap', '经营范围', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandmap', null, array('class' => 'form-control col-md-10','id'=>'brandmap','disabled'=>'disabled','placeholder'=>'经营范围'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandperson', '加盟人群', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandperson', null, array('class' => 'form-control col-md-10','id'=>'brandmap','disabled'=>'disabled','placeholder'=>'加盟人群'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandattch', '加盟意向人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandattch', null, array('class' => 'form-control col-md-10','id'=>'brandattch','disabled'=>'disabled','placeholder'=>'加盟意向人数'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandapply', '申请加盟人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandapply', null, array('class' => 'form-control col-md-10','id'=>'brandapply','disabled'=>'disabled','placeholder'=>'申请加盟人数'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandchat', '项目咨询人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandchat', null, array('class' => 'form-control col-md-10','id'=>'brandchat','disabled'=>'disabled','placeholder'=>'项目咨询人数'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandgroup', '公司名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandgroup', null, array('class' => 'form-control col-md-10','id'=>'brandgroup','disabled'=>'disabled','placeholder'=>'公司名称'))}}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                {{Form::label('brandaddr', '公司地址', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandaddr', null, array('class' => 'form-control col-md-10','id'=>'brandaddr','disabled'=>'disabled','placeholder'=>'公司地址'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::label('brandduty', '是否区域授权', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                    {{Form::text('brandduty', null, array('class' => 'form-control col-md-10','id'=>'brandduty','disabled'=>'disabled','placeholder'=>'是否区域授权'))}}
                                    {{Form::hidden('mid', '0', array('class' => 'form-control col-md-10','id'=>'mid'))}}
                                    {{Form::hidden('nid', '1', array('class' => 'form-control col-md-10','id'=>'nid'))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                   {{date("M j, Y")}}
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li style="display: none">
                <i class="fa fa-camera bg-purple"></i>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{date('j, n,y')}}</span>

                    <h3 class="timeline-header"><a href="#">图集处理</a> 批量上传图集</h3>

                    <div class="timeline-body" style="height: 460px;">
                        {{Form::file('image', array('name'=>'input-image','class' => 'file-loading','id'=>'input-image-1','accept'=>'image/*'))}}
                        <div id="kv-success-modal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Yippee!</h4>
                                    </div>
                                    <div id="kv-success-box" class="modal-body">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{Form::hidden('imagepics', null,array('id'=>'imagepics'))}}
                        <br>
                        <textarea class="form-control col-md-10"  rows="4" placeholder="远程图集上传，不用远程不用填写，例如：&#10;http://www.ysg.cn/images/1.jpg&#10;http://www.ysg.cn/images/2.jpg&#10;http://www.ysg.cn/images/3.jpg" name="ycimagepics" cols="50"></textarea>
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
                        <script id="container" name="body" type="text/plain" ></script>
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
    {!! Form::close() !!}

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
<script>
    $("#input-image-1").fileinput({
        uploadUrl: "/admin/upload/images",
        allowedFileExtensions: ["jpg", "png", "gif"],
        maxImageWidth: 3000,
        maxFileCount: 6,
        resizeImage: true
    }).on('filepreupload', function() {
        $('#kv-success-box').html('');
    }).on('fileuploaded', function(event, data) {
        $('#kv-success-box').append(data.response.link);
        $('#kv-success-modal').modal('show');
        $("#imagepics").val($("#imagepics").val()+data.response.link+',');
        console.log($("#imagepics").val())
    }).on('filepreremoved', function(e, params) {
        console.log('File sorted params', params);
        alert(111);
    }).on('filedeleted', function(event, key) {
        console.log('Key = ' + key);
        arrs=key.split(',')
        $("#imagepics").val($("#imagepics").val().replace(arrs[1]+',',''));
    });
    $("#checktitle input").blur(function(){
        if ($("#checktitle input").val().length)
        {
            $.ajax(
                {type:"POST",url:"/admin/article/titlecheck",data:{"title":$("#checktitle input").val()},
                    datatype: "html",
                    success:function (response, stutas, xhr) {
                        if (response==1)
                        {
                            $("#checktitle").addClass('has-error');
                            $("#checktitle span").css("display","block");
                        }else {
                            $("#checktitle").removeClass('has-error').addClass('has-success');
                            $("#checktitle span").css("display","none");
                        }
                    }
                });
        }
    });
</script>
@stop

