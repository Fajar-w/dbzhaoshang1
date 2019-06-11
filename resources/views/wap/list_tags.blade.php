@extends('wap.mobile')
@section('headlibs')
<title>{{$tags}}-招商创业网</title>
<meta name="keywords" content="{{$tags}}"/>
<meta name="description" content="{{$tags}}"/>
@stop
@section('main_content')

    
<div class="top-nav">
<div class="layout">
<h1 class="top-nav-title">{{$tags}}</h1>
<div class="back"> <a href="javascript:;" onClick="javascript :history.back(-1);">
<svg t="1526974852770" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="https://www.w3.org/2000/svg" p-id="1861" xmlns:xlink="https://www.w3.org/1999/xlink" width="20" height="20">
<defs></defs>
<path d="M706.14190459 997.45185185c-14.91308089 0-29.82616178-5.67007763-41.20515318-17.04906903L237.77795792 553.24398933c-22.75798282-22.71914667-22.75798282-59.61348741 0-82.37147022l427.15879349-427.19762963c22.75798282-22.75798282 59.61348741-22.75798282 82.37147022 0 22.75798282 22.71914667 22.75798282 59.61348741 0 82.37147022l-385.9536403 385.99247645 385.9536403 385.9536403c22.75798282 22.75798282 22.75798282 59.61348741 0 82.37147022C735.96806637 991.78177422 721.05498548 997.45185185 706.14190459 997.45185185z" p-id="1862"></path>
</svg>
</a> </div>
</div>
</div>
@include('wap.topsearch')
<div class="card jm-info">
<div class="layout">
<div class="card-title">{{$tags}}</div>
<div class="card-con">
<ul>
     @foreach($pagelists as $k=>$v)

            <li><a href="/{{$v->ID}}.html">{{$v->post_title}}</a></li>
        @endforeach    
</ul>
</div>
</div>
</div>
<div class="page-choose">
    @php
        $planmu ="/tag/".$tags;
@endphp
<a @if($page==1)href="javascript:void(0);"@else href="{{$planmu}}/page/{{$page-1}}" @endif class="prev">上一页</a>
<span class="page-number"><i>{{$page}}</i>/{{ceil($total/10)}}</span>
<a @if($page==$total)href="javascript:void(0);"@else href="{{$planmu}}/page/{{$page+1}}"  @endif class="next">下一页</a>

</div>
@stop