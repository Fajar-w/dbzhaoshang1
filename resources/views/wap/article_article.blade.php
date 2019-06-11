@extends('wap.mobile')
@section('headlibs')
<title>@if($postarr->seotitle){{$postarr->seotitle}}@else{{$postarr->post_title}}@if(!strstr($postarr->post_title,'招商创业网'))-招商创业网@endif
@endif</title>
<meta name="keywords" content="@if($postarr->seokeys){{$postarr->seokeys}} @else{{$postarr->seotitle}} @endif"/>
<meta name="description" content="{{$desc}}"/>
@stop
@section('main_content')
   <div class="top-nav">
<div class="layout">
<h1 class="top-nav-title">加盟详情</h1>
<div class="back">
<a href="javascript:;" onClick="javascript :history.back(-1);">
<svg t="1526974852770" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1861" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20">
<defs></defs>
<path d="M706.14190459 997.45185185c-14.91308089 0-29.82616178-5.67007763-41.20515318-17.04906903L237.77795792 553.24398933c-22.75798282-22.71914667-22.75798282-59.61348741 0-82.37147022l427.15879349-427.19762963c22.75798282-22.75798282 59.61348741-22.75798282 82.37147022 0 22.75798282 22.71914667 22.75798282 59.61348741 0 82.37147022l-385.9536403 385.99247645 385.9536403 385.9536403c22.75798282 22.75798282 22.75798282 59.61348741 0 82.37147022C735.96806637 991.78177422 721.05498548 997.45185185 706.14190459 997.45185185z" p-id="1862"></path>
</svg>
</a>
</div>

</div>
</div>
<div class="item-info item-info-main">
<div class="layout">
<div class="item-info-title clearfix">
<div class="title_img">
@if(!empty($postarr->images))
    <img class="lazyload" data-original="{{$postarr->images}}">
@else    
 <img src="/chuangye/404.png">
@endif
</div>
<div class="title">
<h2>{{$postarr->post_title}} </h2>
</div>
</div>
</div>
</div>

<div class="showmore">
<div class="item-info">
<div class="layout">
<div class="item-info-summary">
<div><span>所属行业</span>
{!! $arcTm !!}
</div>
<div><span>加盟店数</span><em>{{\Common::proMoren($id,3)}}家</em></div>
</div>
</div>
</div>
<div class="item-info">
<div class="layout">
<div class="item-info-summary item-info-summary-two clearfix">
<div><span>加盟费</span><em>{{$postarr->subtitle}}</em></div>
<div><span>加盟区域</span><em>全国</em></div>
<div><span>好评率</span><em>{{\Common::proMoren($id,2)}}%</em></div>
<div><span>适合人群</span><em>自由创业</em></div>
</div>
</div>
</div>
</div>
<div class="item-article">
<div class="layout">
<div class="title">
<span>加盟介绍</span>
</div>
<div class="con show">
 {!! str_replace("<img src=",'<img class="lazyload" data-original=',$post_content) !!}
<span class="show-btn">点击加载全部</span>
</div>
</div>
</div>

<div class="lightbox-inner">
<div class="layout">
<div class="lightbox">
<form class="registerform" method="post" action="https://message.5988.com/index.php/my_ci/into/" id="dform" target="_blank">
                    <input type="hidden" name="realm" value="m.imnotdoubi.test"><input type="hidden" name="job" value="guestbook"><input type="hidden" name="title" value="{{$postarr->post_title}}"><input type="hidden" name="cla" value="{{$ptermsfl->name}}"><input type="hidden" name="combrand" value="{{$postarr->post_title}}"><input type="hidden" name="resolution" id="resolution">
<h3 class="title">我对{{$postarr->post_title}} 感兴趣，立即留言<span>(24小时内会有专业客服与您联系！)</span></h3>
<em class="input-box">
<label for=""><i>*</i>称&nbsp;呼：</label>
<input type="input" name="username" placeholder="请输入您的称呼">
</em>
<em class="input-box">
<label for=""><i>*</i>手&nbsp;机：</label>
<input type="tel" class="form-input" name="iphone" maxlength="11" placeholder="我们严格保护用户隐私">
</em>
<em class="input-box">
<label for="">留&nbsp;言：</label>
<input type="input" name="content" placeholder="这个项目不错，请尽快联系我">
</em>
<input class="headline-btn" type="submit" value="立即留言" >
</form>
</div>
</div>
</div>
@php
if($postarr->term_id!=0)
    $tuijProjectArr = \Common::getPosts($postarr->pterm_id,'',60); 
else
    $tuijProjectArr = \Common::getPosts($postarr->term_id,'',60); 
@endphp
<div class="box">
<div class="box-title">
相关推荐
</div>
<div class="con">
<ul class="list list-pre-point list-2">
      @forelse($tuijProjectArr as $k=> $v)
        <li><a href="/{{$v->ID}}.html">{{$v->post_title}}</a></li>
    @endforeach  
</ul>
</div>
</div>
<script type="text/javascript" src="/chuangye/jquery.lazyload.js"></script>
<script type="text/javascript">
    $(function() {
          $("img.lazyload").lazyload({
            placeholder : "/chuangye/moren.jpg",
            effect: "fadeIn"});

      });

</script>
@stop





