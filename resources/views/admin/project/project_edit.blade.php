@extends('admin.layouts.admin_app')
@section('title')编辑普通文档@stop
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
        {{Form::model($articleinfos,array('route' =>array( 'keyarticle_edit','id'=>$id,'id2'=>$id2),'method' => 'post','files' => true,))}}

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
                                     {{-- <input class="form-control" id="subtitle" placeholder="副标题" name="subtitle" type="text" value="{{$articleinfos->subtitle}}"> --}}

                         <select class="form-control select2" style="width: 100%" id="subtitle" name="subtitle">
                    <option value="0-1万" @if($articleinfos->subtitle=='0-1万') selected="selected"@endif>0-1万</option>
                    <option value="1-5万" @if($articleinfos->subtitle=='1-5万') selected="selected"@endif>1-5万</option>
                    <option value="5~10万" @if($articleinfos->subtitle=='5-10万') selected="selected"@endif>5-10万</option>
                    <option value="10-20万" @if($articleinfos->subtitle=='10-20万') selected="selected"@endif>10-20万</option>
                    <option value="20-50万" @if($articleinfos->subtitle=='20-50万') selected="selected"@endif>20-50万</option>
                <option value="50-100万" @if($articleinfos->subtitle=='50-100万') selected="selected"@endif>50-100万</option>
                    <option value="100万以上" @if($articleinfos->subtitle=='100万以上') selected="selected"@endif>100万以上</option>
                        </select>
                                     
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">自定义文档属性</label>
                                <div class="checkbox" style="margin-top: 0px;">
                                    <label>
                                        @if(strpos($articleinfos->flags, 'h') !== false)
                                         {{Form::radio('flags', 'h', true,array('class'=>'flat-red'))}} 头条
                                        @else
                                        {{Form::radio('flags', 'h', false,array('class'=>'flat-red'))}} 头条
                                        @endif
                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 'p') !== false)
                                       {{Form::radio('flags', 's', true,array('class'=>'flat-red'))}}图片
                                        @else
                                       {{Form::radio('flags', 's', false,array('class'=>'flat-red'))}}图片
                                        @endif
                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 'c') !== false)
                                           {{Form::radio('flags', 'c', true,array('class'=>'flat-red'))}}推荐
                                        @else
                                            {{Form::radio('flags', 'c', false,array('class'=>'flat-red'))}}推荐
                                        @endif

                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 'f') !== false)
                                            {{Form::radio('flags', 'f', true,array('class'=>'flat-red'))}}幻灯
                                        @else
                                           {{Form::radio('flags', 'f', false,array('class'=>'flat-red'))}}幻灯
                                        @endif
                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 's') !== false)
                                             {{Form::radio('flags', 's', true,array('class'=>'flat-red'))}}滚动
                                        @else
                                             {{Form::radio('flags', 's', false,array('class'=>'flat-red'))}}滚动
                                        @endif
                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 'a') !== false)
                                           {{Form::radio('flags', 'a', true,array('class'=>'flat-red'))}}特荐
                                        @else
                                            {{Form::radio('flags', 'a', false,array('class'=>'flat-red'))}}特荐
                                        @endif
                                    </label>
                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                {{Form::label('seotitle', 'seo标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                                     <input class="form-control" id="seotitle" placeholder="seo标题" name="seotitle" type="text" value="{{$articleinfos->seotitle}}">
                                </div>
                            </div>
                           
                            
                           
                          
                            <div class="form-group col-md-12 ">
                                {{Form::label('typeid', '所属栏目', array('class' => 'col-sm-2 control-label'))}}
                                
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                                   <select class="form-control select2" style="width: 100%" id="selectd" name='term_id'>
                                   
                                        @forelse($topnavs as $v)
                                           @if($v->parent==0)
                                                <option value="{{$v->term_id}}" @if($articleinfos->term_id==$v->term_id) selected = "selected" @endif  @if($id==1 || $v->term_id==1) disabled @endif>{{$v->name}}</option>
                                                  @forelse($topnavs as $v2)
                                                   @if($v2->parent>0)
                                                    @if($v->term_id==$v2->parent)
                    <option value="{{$v2->term_id}}" @if($articleinfos->term_id==$v2->term_id) selected = "selected" @endif > &nbsp;&nbsp;&nbsp;|---{{$v2->name}}</option>
                                                    @endif
                                                    @endif
                                                  @empty @endforelse
                                              
                                            @endif  
                                        @empty @endforelse
                                        </select>
                                         </div>
                            </div>
                            
                           <input type="hidden" name="pid" value=0>
                           

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
                             
                             <div class="form-group col-md-12">
                                {{Form::label('seokeys', 'seo关键字', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                                     <input class="form-control" id="seokeys" placeholder="seo关键字" name="seokeys" type="text" value="{{$articleinfos->seokeys}}">
                                </div>

                            </div>
                           
                            {{-- <div class="form-group col-md-12">
                                {{Form::label('seodescription', 'seo描述', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                 <div class="col-md-4 col-sm-9 col-xs-12">
                               <textarea class="form-control" id="seodescription" placeholder="seo描述" cols="" rows="" name="seodescription">{{\Common::getMetas($id,'description')}}</textarea>
                               </div>
                            </div> --}}
                        @if(substr(\Request::path(),-1)=='2')
                            <div class="form-group col-md-12">
                                {{Form::label('tags', 'tag标签|多个标签请用英文逗号（,）分开', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                     <input class="form-control" id="tags" placeholder="tag标签" name="tags" type="text" value="{{\Common::getPostTags($id)}}">
                                </div>
                            </div>
                        @endif
                           {{--  <div class="form-group col-md-12 ">
                                {{Form::label('status', '编写状态', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="radio col-md-4 col-sm-9 col-xs-12">

                                @if(auth('admin')->user()->type!=3)
                                 @if($articleinfos->status==1)
                                        {{Form::radio('status', '0', false,array('class'=>'flat-red'))}}未开始
                                        {{Form::radio('status', '1', true,array('class'=>'flat-red','checked'=>'checked'))}} 编写中
                                        {{Form::radio('status', '2', false,array('class'=>'flat-red'))}}已完成
                                    @elseif($articleinfos->status==2)
                                       {{Form::radio('status', '0', false,array('class'=>'flat-red'))}}未开始
                                        {{Form::radio('status', '1', true,array('class'=>'flat-red'))}} 编写中
                                        {{Form::radio('status', '2', false,array('class'=>'flat-red','checked'=>'checked'))}}已完成
                                    @else
                                        {{Form::radio('status', '0', false,array('class'=>'flat-red','checked'=>'checked'))}}未开始
                                        {{Form::radio('status', '1', true,array('class'=>'flat-red'))}} 编写中
                                        {{Form::radio('status', '2', false,array('class'=>'flat-red'))}}已完成
                                    @endif
                                @else
                                 {{Form::radio('status', '1', true,array('class'=>'flat-red','checked'=>'checked'))}}编写中
                                 {{Form::radio('status', '2', true,array('class'=>'flat-red'))}}已完成
                                @endif
                                  
                                </div>

                            </div> --}}
                            <div class="form-group col-md-12 ">
                                {{Form::label('post_date', '预选发布时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="input-group date  col-md-4 col-sm-9 col-xs-12">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    
                                   <!--  {{Form::text('post_date', null, array('class' => 'form-control pull-right','id'=>'datepicker','placeholder'=>'点击选择时间'))}}
 -->
                                     <input class="form-control pull-right" id="post_date" placeholder="点击选择时间" name="post_date" value="{{$articleinfos->post_date}}" type="text">
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
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                @if($id2==2)
                                    <img src="{{ $articleinfos->images }}" class="img-rounded img-responsive"/>
                                @else
                                    @if($id > 130263)
                                    <img src="{{ $articleinfos->images }}" class="img-rounded img-responsive"/>
                                    @else
                                    <img src="{{ $articleinfos->images }}" class="img-rounded img-responsive"/>
                                    @endif
                                @endif    
                            </div>

                            <div class="col-md-8 col-sm-12 col-xs-12">
                                {{Form::file('image', array('class' => 'file col-md-10','id'=>'input-2','multiple data-show-upload'=>"false",'data-show-caption'=>"true"))}}
                                {{Form::hidden('litpic',null , array('class' => 'form-control col-md-10','id'=>'litpic'))}}
                            </div>
                           {{--  <div style="clear: both"></div>
                                <br>
                    <input class="form-control"  placeholder="远程图片地址，不是远程不用填写.例如：http://www.ysg.cn/images/1.jpg" name="ycimage" type="text">

                        </div> --}}
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-green">
                   {{date("M j, Y")}}
                  </span>
                </li>
                <!-- /.timeline-label -->

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
    @if(count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <!-- /.row -->

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
    {{-- <script>
        $("#input-image-1").fileinput({
            uploadUrl: "/admin/upload/images",
            uploadAsync: true,
            minFileCount: 1,
            maxFileCount: 6,
            overwriteInitial: false,
            initialPreview: [
                // IMAGE DATA
                @if($pics[0]!=' ')
                @foreach($pics as $pic)
                        "{{$pic}}",
                // IMAGE DATA
                @endforeach
                @endif
            ],
            initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            initialPreviewConfig: [
                @if($pics[0]!=" ")
                    @foreach($pics as $indexnum=>$pic)
                {caption: "{{$indexnum+1}}", size: 827000, width: "120px", url: "/admin/file-delete-batch", key: [ {{$indexnum+1}} ,'{{$pic}}',{{$articleinfos->ID}}]},
                @endforeach
                @endif

            ],
            purifyHtml: true, // this by default purifies HTML data for preview
            uploadExtraData: {
                img_key: "1000",
                img_keywords: "happy, places",
            }
        }).on('filesorted', function(e, params) {
            alert(222);
            console.log('File sorted params', params);
        }).on('fileuploaded', function(event, data) {
            $('#kv-success-box').append(data.response.link);
            $('#kv-success-modal').modal('show');
            $("#imagepics").val($("#imagepics").val()+data.response.link+',');
        }).on('filepreremoved', function(e, params) {
            console.log('File sorted params', params);
            alert(111);
        }).on('filedeleted', function(event, key) {
            console.log('Key = ' + key);
            arrs=key.split(',')
            $("#imagepics").val($("#imagepics").val().replace(arrs[1]+',',''));
        });
    </script> --}}
@stop

