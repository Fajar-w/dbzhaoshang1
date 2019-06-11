@extends('admin.layouts.admin_app')
@section('title')后台管理中心首页@stop
@section('head')
    <link rel="stylesheet" href="/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
@stop
@section('content')
    <!-- Info boxes -->
     @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            @endif
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-clipboard"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">文章总数</span>
                    <span class="info-box-number">{{\App\AdminModel\Archive::where('id','<>',0)->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">前台会员数</span>
                    <span class="info-box-number">{{\App\AdminModel\Admin::where('id','<>',0)->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- TO DO List -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>

                        <h3 class="box-title">最新文章更新列表</h3>

                        <div class="box-tools pull-right">
                            <ul class="pagination pagination-sm inline">

                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="todo-list">
                            @foreach($newArticles as $index=>$newArticle)
                                <li>
                                    <!-- drag handle -->
                                    <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="">
                                    <!-- todo text -->
                                    <span class="text">{{$newArticle->title}}</span>
                                    <!-- Emphasis label -->
                                    <small class="label {{$labelStyle[$index]}} pull-right" style="font-weight: normal;"><i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($newArticle->created_at)->diffForHumans()}}—{{$newArticle->write}}</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row -->
@stop

@section('libs')
    <!-- Sparkline -->
    <!-- AdminLTE for demo purposes -->
    <script src="/adminlte/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="/adminlte/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    

   @stop