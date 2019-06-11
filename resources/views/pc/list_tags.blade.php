@extends('pc.frontend')
@section('headlibs')
<title>{{$tags}}-招商创业网</title>
<meta name="keywords" content="{{$tags}}"/>
<meta name="description" content="{{$tags}}"/>
<link rel="stylesheet" href="/chuangye/iconfont.css">
<link rel="stylesheet" href="/chuangye/pros.css">
@stop
@section('main_content')
<div class="trail">
<div class="layout">
<ul class="clearfix">
<li><a href="/">首页</a></li>

<li><a>{{$tags}}</a></li>
</ul>
</div>
</div>

<div class="layout clearfix mt20">
<div class="layout-trade-l" id="morebrand">
<div class="trade-rank">
<div class="trade-rank-choose clearfix">
<div class="fl clearfix"> <a href="javascript:void(0);" class="active">默认排序</a> </div>
<div class="fr">{{$tags}}所有匹配项目</div>
</div>
<div class="trade-rank-detail">
<ul>
 @foreach($pagelists as $k=>$v)
         <li class="clearfix">
            <div class="item-img fl">@if($v->term_id>=222217)
                <a href="/news/{{$v->ID}}.html" target="_blank">
                    @else
                    <a href="/{{$v->ID}}.html" target="_blank">
                        @endif
                  @if(!empty($v->images))
                    <img src="{{$v->images}}">
                @else    
                 <img src="/chuangye/404.png">
                @endif
            </a></div>
            <div class="trade-rank-detail-con fl">
            <div class="title">@if($v->term_id>=222217)
                <a href="/news/{{$v->ID}}.html" target="_blank">
                    @else
                    <a href="/{{$v->ID}}.html" target="_blank"> @endif
                        {{$v->post_title}}</a></div>
            <div class="company">{{str_replace("加盟","",$v->post_title)}}</div>
            <div class="con">{!! str_replace("补充：{无}","",str_limit(strip_tags($v->post_content),150)) !!}</div>
            </div>
            <div class="trade-rank-enter fr">
            <div class="money">
            <div>投资额</div>
            <span>{{$v->subtitle}}</span> </div>
            <div class="trade-rank-enter-btn"><a href="#" rel="pop_msg" class="bpopup" data-brand="jicyigyxz">申请加盟</a></div>
            <div class="more"><a href="/{{$v->ID}}.html" target="_blank">查看详情&gt;&gt;</a></div>
            </div>
        </li>
        @endforeach    
</ul>
</div>
</div>
<div class="page-trun">
 @if(strstr(substr($obidList->links(), -1),'/')==false)
            {!! str_replace('class="active"><span>','><span class="active">',str_replace('">','">',str_replace("?page=","/page/",$obidList->links()))) !!}
        @endif
</div>
</div>
@include('pc.right')
</div>
@stop