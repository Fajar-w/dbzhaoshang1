@extends('wap.mobile')
@section('headlibs')
<title>【最新加盟项目】好的创业加盟项目大全-招商创业网</title>
<meta name="keywords" content="最新项目加盟"/>
<meta name="description" content="招商创业网为您搜罗了加盟市场上的最新加盟项目，不仅为提供您最新项目所需的加盟费用，还为您列举了加盟费用的详细清单，让您清楚地知道每一笔费用的去处，做一个心知肚明的加盟商！"/>
<link rel="stylesheet" href="/chuangye/wap/common.css">
<style>  img{height:120px; } </style>
@stop
@section('main_content')
<div class="top-nav">
<div class="layout">
<h1 class="top-nav-title">项目库</h1>
<div class="back"> <a href="javascript:;" onClick="javascript :history.back(-1);">
<svg t="1526974852770" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="https://www.w3.org/2000/svg" p-id="1861" xmlns:xlink="https://www.w3.org/1999/xlink" width="20" height="20">
<defs></defs>
<path d="M706.14190459 997.45185185c-14.91308089 0-29.82616178-5.67007763-41.20515318-17.04906903L237.77795792 553.24398933c-22.75798282-22.71914667-22.75798282-59.61348741 0-82.37147022l427.15879349-427.19762963c22.75798282-22.75798282 59.61348741-22.75798282 82.37147022 0 22.75798282 22.71914667 22.75798282 59.61348741 0 82.37147022l-385.9536403 385.99247645 385.9536403 385.9536403c22.75798282 22.75798282 22.75798282 59.61348741 0 82.37147022C735.96806637 991.78177422 721.05498548 997.45185185 706.14190459 997.45185185z" p-id="1862"></path>
</svg>
</a> </div>
</div>
</div>
<ul class="bread-nav">
<li>
<a href="/">首页</a>
</li><li><a href="/xm">项目库</a>
</li></ul>
<p class="filter-show">
您已选择： 全部分类
<button class="btn-dropdown" onclick="filter.open()">筛选</button>
</p>
<div class="filter">
<div class="animate mask" onclick="filter.close(this);" id="filterMask">
<p class="search-line">
<em onclick="filter.close(this)"></em>
<input type="text" placeholder="请输入项目/品牌关键字" >
<button type="button" class="btn-default" data-url="/search?s=" onclick="filter.search()">搜索</button>
</p>
<div class="box">

<div class="filter-container">
<div class="ware">
<div class="filter-box">
<a href="/xm" title="全部加盟项目" class="selected">全部</a>
@forelse(\Common::getLanmus(12) as $v)  
    <a  href="/{{$v->slug}}" title="{{$v->name}}加盟项目">{{$v->name}}</a>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
<div class="list-img-3">
  @foreach($pagelists as $k=>$v)
<div class="list-img-3-item">
  <a href="/{{$v->ID}}.html" title="{{$v->post_title}}">  
 @if(!empty($v->images))<img class="lazyload" data-original="{{$v->images}}" style="display: inline;">@else<img src="/chuangye/moren.jpg" style="display: inline;">@endif
</a>
<div>
<p>
<a  href="/{{$v->ID}}.html">{{$v->post_title}}</a>
</p>
<p>
行业类型： {!! \Common::xmgetcate($v->pterm_id,$v->term_id) !!}
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
  @php
        $planmu ="/xm";
@endphp
<div class="page-choose">
<a @if($page==1)href="javascript:void(0);"@else href="{{$planmu}}/page/{{$page-1}}" @endif class="prev">上一页</a>
<span class="page-number"><i>{{$page}}</i>/{{ceil($total/10)}}</span>
<a @if($page==$total)href="javascript:void(0);"@else href="{{$planmu}}/page/{{$page+1}}"  @endif class="next">下一页</a>
</div>
<script src="/chuangye/wap/common.js"></script>
<script type="text/javascript" src="/chuangye/jquery.lazyload.js"></script>
<script type="text/javascript">
    $(function() {
          $("img.lazyload").lazyload({
            placeholder : "/chuangye/moren.jpg",
            effect: "fadeIn"});

      });

</script>
@stop