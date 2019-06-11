@extends('pc.frontend')
@section('headlibs')
<title>@if($postarr->seotitle){{$postarr->seotitle}}@else{{$postarr->post_title}}@if(!strstr($postarr->post_title,'招商创业网'))-招商创业网@endif
@endif</title>
<meta name="keywords" content="@if($postarr->seokeys){{$postarr->seokeys}}@else{{$postarr->post_title}},{{$termsfl->name}},{{$ptermsfl->name}}@endif"/>
<meta name="description" content="{{$desc}}"/>
<link rel="stylesheet" href="/chuangye/common1.css">
<link rel="stylesheet" href="/chuangye/iconfont.css">
<link rel="stylesheet" href="/chuangye/pros.css">
@stop

@section('main_content')

<div class="trail">
<div class="layout">
<ul class="clearfix">
<li><a href="/">招商创业网</a></li>
{!! $arcdh !!}
<li><h1>{{$postarr->post_title}}</h1></li>
</ul>
</div>
</div>
<div class="item-detail">
<div class="layout clearfix">
<div class="ad-show fl">
<div class="slide">
<div class="syFocusThumb">
<div id="syFocusThumb" class="sliderwrapper">
	@if(!empty($matchimg[1]))
	@forelse($matchimg[1] as $k=> $v)
	@if($k<4)
		<div class="contentdiv" style="display: none; overflow: hidden; z-index: {{$k+3515}}; visibility: visible;">
		<div class="dPic"><img class="lazyload" data-original="{{$v}}" width="400" height="302" alt="{{$postarr->post_title}}"></div>
		</div>
	@endif
	@endforeach
	@else
		<div class="contentdiv" style="display: none; overflow: hidden; z-index: 3516; visibility: visible;">
		<div class="dPic"> <img src="/chuangye/moren.jpg" width="400" height="302" alt="{{$postarr->post_title}}"> </div>
		</div>
	@endif

</div>
<div id="paginate-syFocusThumb" class="pagination"> <i id="prev" class="prev" title="上一幅"></i>
<div class="thumbWrap">
<div class="holder" style="margin-left: 0px;">
@if(!empty($matchimg[1]))
@forelse($matchimg[1] as $k=>$v)
@if($k<4)
	<i class="toc"  rel="1" style="float: left;">
	<a href="javascript:void(0)" target="_blank"> <img class="lazyload" data-original="{{$v}}" width="90" height="92"  alt="{{$postarr->post_title}}" /> </a>
	</i>
	@endif
@endforeach
@else
<i class="toc"  rel="1" style="float: left;">
	<a href="javascript:void(0)" target="_blank"> <img src="/chuangye/moren.jpg" width="90" height="92"  alt="{{$postarr->post_title}}" /> </a>
	</i>
@endif
</div>
</div>
<i id="next" class="next" title="下一幅"></i> </div>
</div>
</div>
</div>

<div class="detail-con fr fr1">
<div class="title">{{$postarr->post_title}}</div>
<div class="detail-con-info">
<ul class="clearfix">
<li><span>项目所属</span>{!! $arcTm !!}</li>
<li><span>成立时间</span>{{\Common::proMoren($id,4)}}</li>
<li><span>适合人群</span>自由创业</li>
<li><span>加盟店数</span>{{\Common::proMoren($id,3)}}家</li>
<li><span>加盟区域</span>全国</li>
<li><span>加盟费</span><a href="#liuyan" rel="nofollow">点击获取</a></li>
</ul>
</div>
<div class="impress">
<ul class="clearfix">
<li>
<div>意向加盟</div>
<div>{{\Common::proMoren($id,1)}}人</div>
</li>
<li>
<div>申请加盟</div>
<div>{{ceil(\Common::proMoren($id,1)/2+17)}}人</div>
</li>
<li>
<div>好评率</div>
<div>{{\Common::proMoren($id,2)}}%</div>
</li>
<li>
<div><span>{{$postarr->subtitle}}</span></div>
<div>投资金额</div>
</li>
</ul>
</div>
<div class="handle-btn clearfix"> <a href="#liuyan" class="syzi" id="bpopup" rel="pop_msg">免费领取资料</a> {{-- <a href="/" class="ljzx" target="_blank">立即咨询</a> --}} <a href="#liuyan" class="sqjm">申请加盟</a> </div>
</div>

</div>
</div>

<div class="item-add mt20">
<div class="layout clearfix">
<div class="layout-trade-l">
<div class="item-article-tab" id="con-nav">
<ul class="clearfix">
<li><a  rel="jmjs" class="active">加盟介绍</a></li>
</ul>
</div>
<div class="item-article" id="jmjs">
<div class="con">
    {!! str_replace("<img src=",'<img class="lazyload" data-original=',$post_content) !!}
</div>
</div>

@include('pc.liuyan')

<div class="hot-rec">
<div class="title">热门项目推荐</div>
<div class="con">
<ul>
	@php
			$rmxmtj = \Common::getPosts($postarr->pterm_id,'',60);
	@endphp
	
@forelse($rmxmtj as $v)
       <li><a href="/{{$v->ID}}.html" target="_blank">
    @if(!empty($v->images))
        <img class="lazyload" data-original="{{$v->images}}">
    @else    
     <img src="/chuangye/404.png">
    @endif
    </a><span>{{$v->post_title}}</span></li>
@endforeach
</ul>
</div>
</div>
</div>
@php
 $hotProjectArr = \Common::getPosts('-2','',10);

if($postarr->term_id!=0)
    $tuijProjectArr = \Common::getPosts($postarr->pterm_id,'',10); 
else
    $tuijProjectArr = \Common::getPosts($postarr->term_id,'',10); 

	$tuijProjectArr2 = \Common::getPnews($id,10); 

@endphp
<div class="layout-trade-r layout-trade-r1">
@if(count($tuijProjectArr2)>0)
<div class="hot-info">
<div class="title">相关资讯</div>
<div class="con">
<ul>
	@forelse($tuijProjectArr2 as $k=> $v)
        <li><a href="/pnews/{{$v->id}}.html" target="_blank">{{$v->post_title}}</a></li>
    @endforeach    
</ul>
</div>
</div>	
@endif
<div class="hot-info">
<div class="title">相关项目推荐</div>
<div class="con">
<ul>
	@forelse($tuijProjectArr as $k=> $v)
        <li><a href="/{{$v->ID}}.html">{{$v->post_title}}</a></li>
    @endforeach    
</ul>
</div>
</div>
<div class="item-rank item-hot-rank mt20">
<div class="title">热门项目排行榜</div>
<div class="con">
<ul>
	@forelse($hotProjectArr as $k=> $v)
	    <li class="clearfix">
		<div class="number fl">{{$k+1}}</div>
		<div class="item-con fl">
		<div class="title"><a href="/{{$v->ID}}.html">{{$v->post_title}}</a></div>
		<div class="money">投资金额：<span>{{$v->subtitle}}</span></div>
		</div>
		<div class="rank-img fr"> <a href="/{{$v->ID}}.html" target="_blank">
				@if(!empty($v->images))
	        <img src="{{$v->images}}">
	    @else    
	     <img src="/chuangye/404.png">
	    @endif
			</a> </div>
		</li>
	@endforeach   

</ul>
</div>
</div>
@if($id < 130185)
<div class="layout-trade-r  layout-trade-r1">
<div class="hot-info">
@include('pc.hidden')
</div>
</div>
@endif
</div>
</div>
</div>
<script type="text/javascript" src="/chuangye/slide.js"></script>
<script>$(document).ready(function() {featuredcontentslider.init({id:"syFocusThumb",contentsource:["inline",""],toc:"scroll",nextprev:["",""],revealtype:"click",enablefade:[false,0.15],autorotate:[true,2500],delay:0,onChange:function(previndex,curindex) {}
});})
</script>
@stop