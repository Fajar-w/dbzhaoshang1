@extends('wap.mobile')
@section('headlibs')
<title>搜索结果 {{$post_jstitle}}-招商创业网</title>
<meta name="keywords" content="{{$post_jstitle}}"/>
<meta name="description" content="招商创业网: '{{$post_jstitle}}' 的搜索結果"/>
<link rel="stylesheet" href="/chuangye/wap/common.css">
<style>  img{height:120px; } </style>
@stop
@section('main_content')
@include('wap.topsearch')
<ul class="bread-nav">
<li><a href="/">首页</a></li>
<li><a href="/xm">项目</a></li>
<li>{{$post_jstitle}}</li>
</ul>

<div class="list-img-3">
  @foreach($pagelists as $k=>$v)
<div class="list-img-3-item">
  <a href="/{{$v->ID}}.html" title="{{$v->post_title}}">  
 @if(!empty($v->images))<img src="{{$v->images}}" style="display: inline;">@else<img src="/chuangye/moren.jpg" style="display: inline;">@endif
</a>
<div class="item-con">
<p>
<a  href="/{{$v->ID}}.html">{{$v->post_title}}</a>
</p>
<p>
加盟意向： {{$v->views}}人
</p>
<p>
投资金额：<span>{{$v->subtitle}}</span>
</p>
<p>
<a href="/{{$v->ID}}.html" class="btn-a-default" >查看详情</a>
<a href="/{{$v->ID}}.html" class="btn-default4">加盟咨询</a>
</p>
</div>
</div> 
@endforeach   
</div>

<script>
        var rep =/{{isset($post_jstitle) ? join('|',preg_split('//u', $post_jstitle, null, PREG_SPLIT_NO_EMPTY)):''}}/ig;
            $('.item-con p a').each(function () {
                $(this).html($(this).text().replace(rep, function (a) {
                    return a.fontcolor('red');
                }));
            });
    </script>
@stop