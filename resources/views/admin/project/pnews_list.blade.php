@extends('admin.layouts.admin_app')
@section('title')文档发布筛选 @stop
@section('position') <li class="active">文档发布筛选</li> @stop
@section('head')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <link href="/adminlte/plugins/select2/select2.min.css" rel="stylesheet">
@stop
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                     @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            @endif
             @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            @endif
            <a class="menuid btn btn-primary btn-sm" href="javascript:history.go(-1)">返回</a> &nbsp;
           
            <a href="/admin/pnews/create" link-url="javascript:void(0)"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 添加项目文章</button></a>  <a href="/admin/pnews/index" link-url="javascript:void(0)"><button class="btn btn-success btn-sm" type="button"> 所有文档</button></a>  <a href="/admin/pnews/index?status=2" link-url="javascript:void(0)"><button class="btn btn-info btn-sm" type="button"> 未审核文档</button></a>
      
                    <h3 class="box-title">文档发布总计{{$articles->total()}}</h3><p>
                        {{Form::open(array('route' => 'pnewslist','files' => false,'class'=>'form-inline pull-right','method'=>'get'))}}
                        <div class="form-group">
                            <div class="input-group date " >
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar" style="width:10px;"></i>
                                </div>
                                {{Form::text('start_at', null, array('class' => 'form-control pull-right','id'=>'datepicker','placeholder'=>'开始时间','style'=>'width:100%'))}}
                            </div>
                        </div>
                        <div class="input-group date " >
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" style="width:10px;"></i>
                            </div>
                            {{Form::text('end_at', null, array('class' => 'form-control pull-right','id'=>'datepicker1','placeholder'=>'结束时间','style'=>'width:100%'))}}
                        </div>
           
                       <div class="form-group">
                            <div class="input-group">
                               

                            </div>
                        </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-location-arrow" style="width:10px;"></i>
                            </div>
                            {{Form::text('title', null,array('class'=>'form-control  pull-right','style'=>'width: 180px;','placeholder'=>"标题"))}}
                        </div>
                    </div>
                      

                        <button type="submit" class="btn btn-danger">筛选数据</button>
                    </form>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                             <th><input type="checkbox" onclick="selectAll(this);"></th>
                            <th style="width: 10px">#ID</th>
                            <th>标题</th>
                            <th>所属项目</th>
                            <th>发布时间</th>
                            <th>审核状态</th>
                            <th>操作</th>
                        </tr>
                         <form class="form-common" action="/admin/article/keywords/fenpei3" method="post" style="margin:0px;display:inline;" onsubmit="return sumbit_sure()">  
                 {{ csrf_field() }}
                        @foreach($articles as $article)
                            <tr>
                                <td><input type="checkbox"  name="idarr[]" value="{{$article->id}}" /></td>
                                <td>{{$article->id}}</td>
                                <td>{{$article->post_title}}</td>
                                <td>
                                        {{$article->projects['post_title']}}
                                  </td>
                                <td>{{$article->post_date}}</td>

                                <td>@if($article->status=="1")  <font style="color:green">已发布</font>@else <font style="color: red;">待审核</font> @endif</td>
                              @if($article->mid==0)
                                    <td class="astyle">

                                        
                                <a href="/admin/pnews/edit/{{$article->id}}"><button class="btn btn btn-warning btn-xs" type="button"><i class="fa fa-paste"></i> 修改</button></a>
                                 
                                <a href="/admin/article/keywords/delete/{{$article->id}}/3">
                                <button class="btn btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i> 删除</button></a>

                                    </td>
                              
                                  @endif


                            </tr>
                        @endforeach


                    <tr>
                            <td colspan=9>

                                <select  class="form-control select2" style="width: 150px" id="selectd" name="czid">
                                            <option value="1"> 批量审核 </option>
                                            <option value="3"> 批量删除 </option> 
                                        </select>
                                <input name="submit" type="submit" value="提交操作" class="btn btn-primary" /> </td>
                            </tr>  
                            
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $articles->appends($arguments)->links() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>

    </div>
    <!-- /.row -->
    <!-- /.content -->
@stop
@section('libs')
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script>
        function sumbit_sure(){  
          var gnl=confirm("确定要操作吗？");  
          if (gnl==true){
            return true;
          }else{  
            return false;  
          } 
        } 
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
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
function selectAll(checkbox) {
            $('input[type=checkbox]').prop('checked', $(checkbox).prop('checked'));
        }
</script>
@stop