@extends('pc.frontend')
@section('headlibs')
<title>{{$lmarr->seo_title}}</title>
<meta name="keywords" content="{{$lmarr->seo_keys}}"/>
<meta name="description" content="{{$lmarr->seo_des}}"/>
<script src="/chuangye/jquery.idTabs.min.js"></script>
@stop

@section('main_content')
<div class="trail">
<div class="layout">
<ul class="clearfix">
<li><a href="/">首页</a></li>
<li><a>{{$lmarr->name}}</a></li>
</ul>
</div>
</div>
<div class="layout clearfix">
<div class="layout-info-l">
    @php
    $urls = \Request::path();
    $id='';
@endphp
<div class="item-info-list" id="zxzs">
<ul>
     @foreach($pagelists as $k=>$v)
            <li class="clearfix">

            <div class="item-img fl">
               <a href="/news/{{$v->ID}}.html">
                @if(!empty($v->images))
                    <img src="{{$v->images}}">
                @else    
                 <img src="/chuangye/404.png">
                @endif
                </a></div>
            <div class="item-right fr">
            <div class="title"><a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></div>
            <div class="con">　{!! str_replace("补充：{无}","",str_limit(strip_tags($v->post_content),200)) !!}</div>
            <div class="tips clearfix">
            <div class="time fl">更新时间：{{$v->post_date}}</div>
            <div class="article-trade fr">
            <span>文章行业：</span>
            {{$lmarr->name}}
            </div>
            </div>
            </div>
            </li>
        @endforeach    
</ul>
</div>
<div class="page-trun">
     @if(strstr(substr($pagelists->links(), -1),'/')==false)
            {!! str_replace('class="active"><span>','><span class="active">',str_replace('">','">',str_replace("?page=","/page/",$pagelists->links()))) !!}
                    @endif
</div>
</div>
@php
 $hotNewsArr = \Common::getNews('-1',10); 
 $tuijNewsArr = \Common::getNews('-2',6); 
@endphp
<div class="layout-info-r">
<div class="hot-info">
<div class="title">热门资讯</div>
<div class="con">
<ul>
@forelse($hotNewsArr as $k=> $v)
        <li> <a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></li>
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

<div class="layout-info-r">
</div>
</div>
</div>

@stop