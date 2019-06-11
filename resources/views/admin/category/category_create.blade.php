@extends('admin.layouts.admin_app')
@section('title') 网站栏目管理_添加栏目 @stop
    @section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/adminlte/dist/css/fileinput.min.css" rel="stylesheet">
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">常规选项</a></li>
                    {{-- <li><a href="#timeline" data-toggle="tab">高级选项</a></li> --}}
                   {{--  <li><a href="#activity" data-toggle="tab">单页面内容添加</a></li> --}}
                </ul>
                {{Form::open(array('route' => 'category_create','files' => true,'class'=>"form-horizontal"))}}
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <div style="margin-bottom: 15px;"></div>

                        <div class="form-group">
                            {{Form::label('name', '栏目名称', array('class' => 'col-sm-2 control-label'))}}
                            <div class="col-sm-5">
                                {{Form::text('name', null, array('class' => 'form-control','id'=>'name','placeholder'=>'栏目名称'))}}
                            </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('slug', '栏目路径', array('class' => 'col-sm-2 control-label'))}}
                            <div class="col-sm-5">
                                {{Form::text('slug', null, array('class' => 'form-control','id'=>'slug','placeholder'=>'栏目路径'))}}
                            </div>
                        </div>
                        <div class="form-group">
                                {{Form::label('selectd', '文章所属', array('class' => 'col-sm-2 control-label'))}}
                                <div class="col-sm-5">
                                   <select class="form-control select2" style="width: 100%" id="selectd" name="taxonomy" >
                                                <option value="category">项目</option>
                                                <option value="news">文章</option>
                                        </select>
                                </div>
                            </div>
                       
                            <div class="form-group">
                                {{Form::label('selectd', '所属目录', array('class' => 'col-sm-2 control-label'))}}
                                <div class="col-sm-5">
                               
                                   <select class="form-control select2" style="width: 100%" id="selectd" name="parent" >
                                        <option value="0">不选为顶级</option>
                                        @forelse($topnavs as $v)
                                           
                                                <option value="{{$v->term_id}}" @if($id==$v->term_id) selected = "selected" @endif>{{$v->name}}</option>
                                                 
                                              
                                        @empty @endforelse
                                        </select>
                                         
                                      
                                         
                                </div>
                            </div>
                        

                        <div class="form-group">
                                    {{Form::label('seo_title', 'SEO 标题', array('class' => 'col-sm-2 control-label'))}}
                                    <div class="col-sm-5">
                                        
                                        <input class="form-control" id="seo_title" placeholder="SEO 标题" name="seo_title" type="text" >
                                    </div>
                                </div>
                             
                              

                                <div class="form-group">
                                    {{Form::label('seo_keys', '栏目关键字', array('class' => 'col-sm-2 control-label'))}}
                                    <div class="col-sm-5">
                                        <input class="form-control" id="seo_keys" placeholder="栏目关键字" name="seo_keys" type="text" >
                                    </div>
                                </div>

                          
                                <div class="form-group">
                                    {{Form::label('seo_des', '栏目描述', array('class' => 'col-sm-2 control-label'))}}
                                    <div class="col-sm-5">
                                       
                                        <input class="form-control" id="seo_des" placeholder="栏目描述" name="seo_des" type="text" ">

                                    </div>
                                </div>
                               
 
                            <div class="form-group">
                                    {{Form::label('description', '图像描述', array('class' => 'col-sm-2 control-label'))}}
                                    <div class="col-sm-5">
                                    
                                        <textarea class="form-control" id="description" placeholder="图像描述" cols="" rows="" name="description"></textarea>


                                    </div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('term_group', '排序', array('class' => 'col-sm-2 control-label'))}}
                                    <div class="col-sm-5">
                                        
                                        <input class="form-control" id="term_group" placeholder="排序" name="term_group" type="text" >
                                    </div>
                                </div>

                                 <input class="form-control" id="taxonomy" name="taxonomy"  value="category" type="hidden">
                               
                        </div>

                    <!-- /.tab-pane -->
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{Form:: button('提交',array('class'=>'btn btn-danger','type'=>'submit'))}}
                    </div>
                </div>
                {!! Form::close() !!}
                        <!-- /.tab-content -->

            </div>
            <!-- /.nav-tabs-custom -->
            @if(count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    @stop

    @section('libs')
    <script src="/adminlte/plugins/summernote/summernote.min.js"></script>
    <script src="/adminlte/plugins/summernote/lang/summernote-zh-CN.js"></script>
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script src="/js/fileinput.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#summernote').summernote({
                height: 500,
                lang : 'zh-CN',
                callbacks: {
                    onImageUpload: function(files) {
                        //上传图片到服务器，使用了formData对象，至于兼容性...据说对低版本IE不太友好
                        var formData = new FormData();
                        formData.append('file',files[0]);
                        $.ajax({
                            type: 'POST',
                            url : '/admin/upload/articleimages',//后台文件上传接口
                            data : formData,
                            enctype: 'multipart/form-data',
                            processData : false,
                            contentType : false,
                            success: function(filename) {
                                var file_path ='/images/thread/'+ filename;
                                console.log(file_path);
                                $('#summernote').summernote("insertImage", file_path);
                            }
                        });
                    },
                    onChange: function(contents, $editable) {
                        // console.log('onChange:', contents, $editable);
                        $("#lawsContent").val(contents)
                        console.log($("#lawsContent").val())
                    },
                }
            });
        })

    </script>
    <script>
        $(function () {

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
            $("#typeimages").val($("#typeimages").val()+data.response.link+',');
            console.log($("#typeimages").val())
        }).on('filepreremoved', function(e, params) {
            console.log('File sorted params', params);
            alert(111);
        }).on('filedeleted', function(event, key) {
            console.log('Key = ' + key);
            arrs=key.split(',')
            $("#typeimages").val($("#typeimages").val().replace(arrs[1]+',',''));
        });
    </script>
@stop

