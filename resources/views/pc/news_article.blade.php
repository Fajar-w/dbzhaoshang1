@extends('pc.frontend')
@section('headlibs')
<title>@if($postarr->seotitle){{$postarr->seotitle}}@else{{$postarr->post_title}}@endif-招商创业网</title>
<meta name="keywords" content="@if($postarr->seokeys){{$postarr->seokeys}} @else{{$postarr->seotitle}} @endif"/>
<meta name="description" content="{!! str_replace("补充：{无}","",str_limit(strip_tags($postarr->post_content),180)) !!}"/>
@stop
@section('main_content')
<div class="trail">
<div class="layout">
<ul class="clearfix">
<li><a href="/">招商创业网</a></li>
{!! $arcdh !!}
<li><a>{{$postarr->post_title}}</a></li>
</ul>
</div>
</div>
<div class="layout clearfix">
<div class="layout-info-l">
<div class="info-article">
<div class="title"><h1>{{$postarr->post_title}}</h1></div>
<div class="time">
<span>发布时间：{{$postarr->post_date}}</span>
<span>作者：招商创业网</span>
</div>
<div class="con">
    {!! $post_content !!}
</div>
</div>
<div class="article-tags">
    @php
        $tagsarr = \Common::getIdPostTags($id);
    @endphp
    @if(count($tagsarr) > 0)
    标签：
    @forelse($tagsarr as $v)
       <a href="/tag/{{$v->slug}}" rel="tag">{{rawurldecode(strtolower($v->slug))}}</a>
     @endforeach
     @endif
  
</div>

<div class="page-article clearfix">
<div class="prev clearfix fl">
<div class="con fl">
<div>上一篇</div>
<span>  @if(empty($prev_article))  暂无 @else
        <a href="/news/{{$prev_article->ID}}.html" rel="prev">{{$prev_article->post_title}}</a>@endif</span>
</div>
</div>
<div class="next clearfix fr">
<div class="con fr">
<div>下一篇</div>
<span> @if(empty($next_article))暂无
            @else
        <a href="/news/{{$next_article->ID}}.html" rel="next">{{$next_article->post_title}}</a>@endif</span>
</div>
</div>
</div>

@include('pc.liuyan')

<div class="item-info-list" id="zxzs">
<div class="item-info-list-title">相关阅读</div>
<ul>
 @forelse($xgydnews as $v)
                <li class="clearfix">
                <div class="item-img fl"><a href="/news/{{$v->ID}}.html"><img src="@if($v->images=='')/chuangye/404.png @else {{$v->images}}@endif"></a></div>
                <div class="item-right fr">
                <div class="title"><a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></div>
                <div class="con">{!! str_replace("补充：{无}","",str_limit(strip_tags($v->post_content),150)) !!}</div>
                <div class="tips clearfix">
                <div class="time fl">更新时间：{{$v->post_date}}</div>
                <div class="article-trade fr">
                <span>文章行业：</span>
                {{$termsfl->name}}
                </div>
                </div>
                </div>
                </li>
@endforeach


</ul>
</div>
</div>
@php
 $hotNewsArr = \Common::getNews('-1',5); 
 $tuijNewsArr = \Common::getNews('-2',6); 
@endphp
<div class="layout-info-r">
<div class="hot-acticle">
<div class="title">热门文章</div>
<div class="con">
<ul>
    @forelse($hotNewsArr as $k=> $v)
        <li class="clearfix"><a href="/news/{{$v->ID}}.html"><span>{{$v->post_title}}</span><img src="@if($v->images=='')/chuangye/404.png @else {{$v->images}}@endif"></a></li>
 @endforeach

</ul>
</div>
</div>
<div class="ad-info-r">
<ul>
  @forelse($tuijNewsArr as $k=> $v)
<li><a href="/{{$v->ID}}.html"><img src="@if($v->images=='')/chuangye/404.png @else {{$v->images}}@endif" alt="{{$v->post_title}}"><span>{{$v->post_title}}</span></a></li>
@endforeach
</ul>
</div>
{{-- 
<div class="layout-info-r">
<div class="hot-info">
@include('pc.hidden')
</div>
</div> --}}

</div>
</div>

@stop