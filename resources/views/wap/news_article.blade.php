@extends('wap.mobile')
@section('headlibs')
<title>@if($postarr->seotitle){{$postarr->seotitle}}@else{{$postarr->post_title}}@endif</title>
<meta name="keywords" content="@if($postarr->seokeys){{$postarr->seokeys}} @else{{$postarr->seotitle}} @endif"/>
<meta name="description" content="{!! str_replace("补充：{无}","",str_limit(strip_tags($postarr->post_content),180)) !!}"/>
@stop
@section('main_content')
<div class="top-nav">
<div class="layout">
<div class="top-nav-title">{{$arcTm}}</div>
<div class="back"> <a href="javascript:;" onClick="javascript :history.back(-1);">
<svg t="1526974852770" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="https://www.w3.org/2000/svg" p-id="1861" xmlns:xlink="https://www.w3.org/1999/xlink" width="20" height="20">
<defs></defs>
<path d="M706.14190459 997.45185185c-14.91308089 0-29.82616178-5.67007763-41.20515318-17.04906903L237.77795792 553.24398933c-22.75798282-22.71914667-22.75798282-59.61348741 0-82.37147022l427.15879349-427.19762963c22.75798282-22.75798282 59.61348741-22.75798282 82.37147022 0 22.75798282 22.71914667 22.75798282 59.61348741 0 82.37147022l-385.9536403 385.99247645 385.9536403 385.9536403c22.75798282 22.75798282 22.75798282 59.61348741 0 82.37147022C735.96806637 991.78177422 721.05498548 997.45185185 706.14190459 997.45185185z" p-id="1862"></path>
</svg>
</a> </div>
</div>
</div>
<div class="trail">
<div class="layout">
<ul>
<li> <a href="/">首页</a> </li>
{!! $arcdh !!}
<li><span>{{$postarr->post_title}}</span></li>
</ul>
</div>
</div>

<div class="info-article">
<div class="layout">
<h1 class="title">{{$postarr->post_title}}</h1>
<div class="about">
<div> <span>{{$postarr->post_date}}</span> </div>
<div> <span>来源：</span> <span>招商创业网</span> </div>
</div>
<div class="con">
 {!! $post_content !!}
</div>
</div>
<div class="btn">
<div class="layout">
 @if(empty($prev_article))上一篇:暂无 @else
        <a href="/news/{{$prev_article->ID}}.html" rel="prev">{{$prev_article->post_title}}</a>@endif</a>

@if(empty($next_article))下一篇:暂无
            @else
        <a href="/news/{{$next_article->ID}}.html" rel="next">{{$next_article->post_title}}</a>@endif</a>
</div>
</div>
</div>

<div class="card jm-info">
<div class="layout">
<div class="card-title">相关阅读</div>
<div class="card-con">
<ul>
 @forelse($xgydnews as $v)
            <li><a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></li>
@endforeach
</ul>
</div>
</div>
</div>
<div class="card jm-info">
<div class="layout">
<div class="card-title">热门推荐</div>
<div class="card-con">
<ul>
    @php
 $hotNewsArr = \Common::getNews('-1',5); 
@endphp
@forelse($hotNewsArr as $k=> $v)
        <li><a href="/news/{{$v->ID}}.html"><span>{{$v->post_title}}</a></li>
 @endforeach
</ul>
</div>
</div>
</div>

@stop