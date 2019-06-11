@extends('admin.layouts.admin_app')
@section('title')网站文档列表@stop
@section('head')
<style>.red{color: red;}</style>
@stop
@section('content')
 <?php
$urlstr = Request::getRequestUri();
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">文档列表管理 ==
  @if($urlstr=='/admin/article')
                                    <a href="/admin/article/create{{$id}}" style="color: #ffffff ; display: inline-block; padding-left: 3px;"><button  class="btn btn-default bg-blue"><i class="fa  fa-pencil-square"></i>二级域名添加文档</button></a> 
   @elseif($urlstr=='/admin/u88article')  
                                    <a href="{{action('Admin\ArticleController@U88Create')}}" style="color: #ffffff; display: inline-block; padding-left: 3px;"><button  class="btn btn-default bg-purple"><i class="fa  fa-pencil-square-o"></i>u88展会添加文档</button></a>
                                    @else
                                    <a href="/admin/article/create{{$id}}" style="color: #ffffff ; display: inline-block; padding-left: 3px;"><button  class="btn btn-default bg-blue"><i class="fa  fa-pencil-square"></i>二级域名添加文档</button></a>
                                   <!--  <a href="{{action('Admin\ArticleController@U88Create')}}" style="color: #ffffff; display: inline-block; padding-left: 3px;"><button  class="btn btn-default bg-purple"><i class="fa  fa-pencil-square-o"></i>u88展会添加文档</button></a> -->
                                    @endif
                        </h3>
                        <div class="box-tools">
                            @if(strstr($urlstr,'admin/article'))

<form method="GET" action="/admin/article{{$id}}" accept-charset="UTF-8" style="margin:0px;display:inline;">
    @else
    <form method="GET" action="/admin/u88article" accept-charset="UTF-8" style="margin:0px;display:inline;">
    @endif
   
                    <div class="input-group input-group-sm" >
                         @if($id!='' || strstr($urlstr,'/admin/article13')  )
                                <select  style="width: 150px;" data-placeholder="栏目"  name="typeid" class="form-control select2" >
                                    <option value="0" >请选择栏目</option>
                                     @forelse($categorys as $v)
                                        @if($v->cid==0)
                                            @if( $v->mid==0 && $v->topid==$id)
                                                <option value="{{$v->id}}" @if($v->id==$typeid) selected='selected' @endif>{{$v->typename}}</option>
                                                  @forelse($categorys as $v2)
                                                    @if($v->id==$v2->topid)
                    <option value="{{$v2->id}}" > &nbsp;&nbsp;&nbsp;|---{{$v2->typename}}</option>
                                                    @endif
                                                  @empty @endforelse
                                             @endif 
                                        @endif   
                                        @empty @endforelse
                                   
                                </select>
                                @elseif(strstr($urlstr,'/admin/u88article'))
                                <select  style="width: 150px;" data-placeholder="栏目"  name="typeid" class="form-control select2" >
                                    <option value="0" >请选择栏目</option>
                                     @forelse($categorys as $v)
                                        @if($v->cid==0)
                                            @if( $v->mid==9 && $v->topid==25)
                                                <option value="{{$v->id}}" @if($v->id==$typeid) selected='selected' @endif>{{$v->typename}}</option>
                                             @endif 
                                        @endif   
                                        @empty @endforelse
                                   
                                </select>
                                @endif
                                &nbsp;
                            <input type="text" name="title" class="form-control pull-right" placeholder="标题" style="margin-top: 0px;width: 350px;" value="{{$title}}">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                    </div>
                                 </form>
                                 <div class="input-group-btn">
                                  
                                    
                                    <!--<a href="{{action('Admin\ArticleController@ProductionCreate')}}" style="color: #ffffff; display: inline-block; padding-left: 3px;"><button  class="btn btn-default bg-green"><i class="fa  fa-pencil-square-o"></i>产品添加</button></a>-->
                                    
                                </div>
                           
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                         <form action="/admin/article/pendingaudit" method="post" name="myform"  onsubmit="return sumbit_sure()" >
                 {{ csrf_field() }}
                        <table class="table table-hover">
                            <tr>
                                <th><input type="checkbox" onclick="selectAll(this);"></th>
                                <th>ID</th>
                                <th>文章标题</th>
                                <th>所属分类</th>
                                <th>栏目</th>
                                <th>发布时间</th>
                                <th>发布人</th>
                                <th>点击</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            @foreach($articles as $article)
                            <tr>
                                 <td><input type="checkbox"  name="idarr[]" value="{{$article->id}}" /></td>
                                <td>{{$article->id}}</td>
                                <td>@if($article->ismake) {{$article->title}} @else <s class="red">{{$article->title}}</s> @endif </td>
                                <td>@if($article->pid!=0){{$article->arctype2->typename}}@else餐饮加盟@endif</td>
                                <td>{{$article->arctype->typename}}</td>
                                <td>{{$article->created_at}}</td>
                                <td>{{$article->write}}</td>
                                <td>{{$article->click}}</td>
                                <td>@if($article->ismake) 已审核 @else <s class="red">未审核</s> @endif</td>
                                <td class="astyle"><span class="label label-success">
                                    @if($article->arctype->mid==9)
                                        <a href="http://www.u88.test/zhanhui/{{$article->id}}.html" target="_blank">预览</a></span>
                                    @else
                                        <a href="https://{{$article->arctype2->typedir}}.u88.com/article/{{$article->id}}.html" target="_blank">预览</a></span>
                                    @endif
                                     @if(auth('admin')->user()->flg==1)
                                        <span class="label label-warning">
                                        @if($article->arctype->mid==0)
                                        <a href="/admin/article/edit{{$article->pid}}/{{$article->id}}">
                                        @else
                                        <a href="/admin/u88article/edit/{{$article->id}}">
                                        @endif
                                        编辑</a></span>
                                        
                                        <span class="label label-danger"><a data-toggle="modal" data-target=".modal-sm{{$article->id}}" >删除</a></span>
                                        @else
                                            @if($article->ismake==0)
                                             <span class="label label-warning">
                                                 <a href="/admin/article/edit{{$article->pid}}/{{$article->id}}">
                                                     编辑</a></span>
                                                     @endif

                                        @endif
                                    <div class="modal fade modal-sm{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel{{$article->id}}">
                                        <div class="modal-dialog modal-sm modal-s-m{{$article->id}}" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <h5 class="modal-title" id="mySmallModalLabel{{$article->id}}">是否要删除当前文章</h5>
                                                </div>
                                                <div class="modal-body">
                                                    {{$article->title}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                                                    @if(auth('admin')->user()->flg==1)
                                                    <button type="button" class="btn btn-primary" id="btn-{{$article->id}}" onclick="AjDelete({{$article->id}},'modal-s-m{{$article->id}}')">删除</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                               
                            </tr>
                                @endforeach
                             @if(auth('admin')->user()->flg==1)
                                 <tr>
                            <td colspan=5><input name="submit" type="submit" value="审核" class="btn btn-primary" /> </td>
                            </tr>  
                            @endif
                        </table>
                    </form>

                        @if(strstr($urlstr,'?typeid'))
                                            {!! $articles->appends(['typeid'=>$typeid,'title'=>$title])->links() !!} 
                                        @else
                                            {!! $articles->links() !!} 
                                        @endif

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    <!-- /.content -->
@stop

@section('libs')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        });
        function startRequest() {
            window.location.reload()
        }
        function AjDelete (id,node) {
            var id = id;
            var node=node;
            $.ajax({
                //提交数据的类型 POST GET
                type:"POST",
                //提交的网址
                url:"/admin/article/delete/"+id,
                //提交的数据
                data:{"id":id,'node':node},
                //返回数据的格式
                datatype: "html",    //"xml", "html", "script", "json", "jsonp", "text".
                success:function (response, stutas, xhr) {
                    alert('删除成功！');
                    $(".modal-s-m"+id+" .modal-body").html(response);
                    $("#btn-"+id).attr("disabled","disabled");
                    setInterval("startRequest()", 600);

                }
            });
        }


        function selectAll(checkbox) {
            $('input[type=checkbox]').prop('checked', $(checkbox).prop('checked'));
        }

        function sumbit_sure(){  
          var gnl=confirm("确定要审核？");  
          if (gnl==true){
            return alert("审核成功，请查看！");
          }else{  
            return false;  
          }  
        } 

    </script>

@stop


