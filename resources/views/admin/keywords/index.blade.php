@extends('admin.layouts.admin_app')
@section('title')文章列表@stop
@section('content')
<div class="row">
     <?php
$urlstr = Request::getRequestUri();
        ?>
    <div class="col-sm-12">
         <div class="alert alert-warning alert-dismissable">
            文章列表
        </div>
        <div class="ibox-content">
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
             @if(auth('admin')->user()->type!=3)
            <a href="/admin/article/keywords/create" link-url="javascript:void(0)"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus-circle"></i> 添加文章</button></a>
            @endif
            <table class="table table-striped table-bordered table-hover m-t-md">
                <thead>
                <tr>
                    <th><input type="checkbox" onclick="selectAll(this);"></th>
                    <th class="text-center" width="100">ID</th>
                    <th>栏目</th>
                    <th>标题</th>
                    <th>所属编辑</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                    <th class="text-center" width="100">状态</th>
                    <th class="text-center" width="300">操作</th>
                </tr>
                </thead>
                <form class="form-common" action="/admin/article/keywords/fenpei" method="post" style="margin:0px;display:inline;">  
                 {{ csrf_field() }}
                <tbody>
                @foreach($articleList as $key => $item)
                    <tr>
                        
                         <td><input type="checkbox"  name="idarr[]" value="{{$item->id}}" /></td>
                        <td  class="text-center" >{{$item->id}}</td>
                        <td>{{$item->arctype['typename']}}</td>
                        <td>{{$item->title}}</td>
                        <td>@if($item->dutyadmin==0) <font style="color: red;">无</font> @else {{$item->dutyadmins['name']}} @endif</td>
                        <td>{{$item->created_at}}</td>
                        <td >{{$item->updated_at}}</td>
                        <td class="text-center">@if($item->ismake==0) <font style="color: red;">待审核</font>@else <font style="color:green">已发布</font> @endif</td>
                        <td class="text-center">
                            <div class="btn-group">
                                {{-- <a href="/admin/article/keywords/show/{{$item->id}}" target="_blank"><button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 预览</button></a> --}}
                                <a href="/admin/article/keywords/edit/{{$item->id}}"><button class="btn btn btn-warning btn-xs" type="button"><i class="fa fa-paste"></i> 修改</button></a>
                                 @if(auth('admin')->user()->type!=3)
                                <a href="/admin/article/keywords/delete/{{$item->id}}">
                                <button class="btn btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i> 删除</button></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
 @if(auth('admin')->user()->type!=3)
                    <tr>
                            <td colspan=9>
                                 {{-- <select  id="selectd" name="adminid">
                                        @foreach($admins as $v)
                                            @foreach($adminRole as $v2)
                                                @if($v->id == $v2->admin_id)
                                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                                @endif
                                            @endforeach    
                                        @endforeach
                                        </select> --}}
                                <input name="submit" type="submit" value="删除数据" class="btn btn-primary" /> </td>
                            </tr>  
                            @endif
                             </form>

                </tbody>
            </table>

                               @if(strstr($urlstr,'?typeid'))
                                            {!! $articleList->appends(['typeid'=>$typeid,'title'=>$title])->links() !!} 
                                        @else
                                            {!! $articleList->links() !!} 
                                        @endif
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
function selectAll(checkbox) {
            $('input[type=checkbox]').prop('checked', $(checkbox).prop('checked'));
        }
</script>
@endsection