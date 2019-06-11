@extends('pc.frontend')
@section('headlibs')
<title>{{$indexInfos->seo_title}}</title>
<meta name="keywords" content="{{$indexInfos->seo_keys}}">
<meta name="description" content="{{$indexInfos->seo_des}}">
<link rel="stylesheet" href="/chuangye/swiper.min.css">
@stop
@section('main_content')
<div class="card-top">
<div class="layout clearfix">
<div class="layout-l clearfix">
<div class="dropdown fl">
<ul>
  @php
    $categorys = \Common::getLanmus(11); 
  @endphp
@forelse($categorys as $k=>$v)
  @if($k < 8)
    <li class="{{$v->slug}}"><a href="/{{$v->slug}}" target="_blank">{{$v->name}}</a>
    <div class="dropdown-box">
    <ul class="clearfix">
        @forelse(\Common::getLanmus2($v->term_id) as $v2)  
            <li><a href="/{{$v->slug}}/{{$v2->slug}}" target="_blank">{{$v2->name}}</a> </li>
        @endforeach
    </ul>
    </div>
    </li>
    @endif
@endforeach

</ul>
</div>
<div class="ad-main fr">
<div class="swiper-container">
<div class="swiper-wrapper">
<div class="swiper-slide"> <a href="/" title="瓦罐香沸" target="_blank"><img src="/chuangye/1.jpg" alt="瓦罐香沸"></a></div>
<div class="swiper-slide"> <a href="/" title="汤姆之家汉堡" target="_blank"><img src="/chuangye/2.jpg" alt="汤姆之家汉堡"></a></div>
<div class="swiper-slide"> <a href="h/" title="蜀锅串串" target="_blank"><img src="/chuangye/3.jpg" alt="蜀锅串串"></a></div>
<div class="swiper-slide"> <a href="/" title="贝克汉堡" target="_blank"><img src="/chuangye/4.jpg" alt="贝克汉堡"></a></div>
</div>
</div>
<div class="ppsb"> <span>品牌上榜</span>
 @forelse($arcArrleftgund as $k=> $v)
<a href="/{{$v->ID}}.html" target="_blank">{{$v->post_title}}</a>
@endforeach
</div>
<div class="ad-main-down">
<ul class="clearfix">
@forelse($arcArrleftgund as $k=> $v)
@if($k<4)
<li><a href="/{{$v->ID}}.html" title="{{$v->post_title}}" target="_blank"><img src="{{$v->images}}" alt=""></a></li>
@endif
@endforeach


</ul>
</div>
</div>
</div>
<div class="layout-r">
<div class="jm-rank">
<div class="title hot">加盟排行榜</div>
<div class="jm-rank-shuoming clearfix">
<div class="number fl">排名</div>
<div class="list fl">商家列表</div>
<div class="mark fr">索引指数</div>
</div>
<div class="jm-rank-con">
<ul>
     @forelse($arcArrConTej as $k=> $v)
        <li class="clearfix @if($k==0) active @endif">
        <div class="number fl">{{$k+1}}</div>
        <div class="list fl">
        <div class="jm-rank-con-title">{{$v->post_title}}</div>
        <div class="jm-rank-con-detail clearfix">
        <div class="item-logo fl"><a href="/{{$v->ID}}.html" target="_blank"><img src="{{$v->images}}" alt="{{$v->post_title}}"></a></div>
        <div class="con fl">
        <div><a href="/{{$v->ID}}.html" target="_blank">{{$v->post_title}}</a></div>
        <span>投资额：{{$v->subtitle}}</span> <span>{{substr($v->post_date,5,5)}}</span> </div>
        </div>
        </div>
        <div class="mark fr">{{$v->views}}</div>
        </li>

    @endforeach
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="card-center">
<div class="layout clearfix">
<div class="layout-l">
<div class="hot-pp">
<div class="title clearfix">
<div class="fl">热门品牌</div>
<div class="fr">
<li><a href="" title="" target="_blank"></a></li>
</div>
</div>
<div class="pp-con clearfix">
<div class="hot-pp-l fl">
<div class="hot-pp-l-top">
    @forelse($chuanchuanxArc as $k=> $v)
                  @if($k==0)
        <a href="/{{$v->ID}}.html" target="_blank"><img  src="{{$v->images}}" alt="{{$v->post_title}}"></a>
      @endif
     @endforeach

</div>
<div class="hot-pp-l-list">
<ul class="clearfix">
     @forelse($chuanchuanxArc as $k=> $v)
                  @if($k>0)
         <li><a href="/{{$v->ID}}.html" target="_blank"> <span>{{$v->post_title}}</span>
        <img src="{{$v->images}}"> </a>
        </li>
      @endif
     @endforeach
</ul>
</div>
</div>
<div class="item-card-list fr">
<ul class="clearfix">

@forelse($maocaiArc as $k=> $v)
        <li><a href="/{{$v->ID}}.html" target="_blank"><img src="{{$v->images}}" alt="{{$v->post_title}}">
<div class="more">¥{{$v->subtitle}}<i>了解详情</i></div>
</a></li>
     @endforeach

</ul>
</div>
</div>
</div>
</div>
<div class="layout-r">
<div class="jm-tips">
<div class="title">加盟知识<a href="/" target="_blank">查看更多</a></div>
<div class="con">
<ul>
      @forelse($hyzsArc as $k=> $v)
             <li @if($k==0) class="hot" @endif ><a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></li>
     @endforeach
</ul>
</div>
</div>
<div class="jm-tips jmzs">
<div class="title">加盟商机<a href="/" target="_blank">查看更多</a></div>
<div class="con">
<ul>
    @forelse($cyglArc as $k=> $v)
             <li @if($k==0) class="hot" @endif ><a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></li>
     @endforeach
</ul>
</div>
</div>
</div>
</div>
</div>
  @forelse($categorys as $v)
  @php
     $tjpostarr =  \Common::getPosts($v->term_id,'',21);
  @endphp
    <div class="card-item canyin">
    <div class="layout clearfix">
    <div class="layout-l">
    <div class="trade">
    <div class="title clearfix">
    <div class="fl">{{$v->name}}</div>
    <div class="fr">
        @forelse( $tjpostarr as $k=>$v2)   
                @if($k<3)  
                 <a href="/{{$v2->ID}}.html" target="_blank">{{$v2->post_title}}</a>
                 @endif
        @endforeach
    </div>
    </div>
    <div class="trade-con clearfix">
    <div class="trade-con-l fl">
    <div class="trade-con-l-top">
    <ul class="clearfix">
        @forelse($tjpostarr as $k=>$v2)   
                @if($k>2 && $k < 9)  
                  <li><a href="/{{$v2->ID}}.html" title="{{$v2->post_title}}" target="_blank"><img class="lazyload" data-original="{{$v2->images}}" ><span>{{$v2->post_title}}</a></li>
                 @endif
        @endforeach
    </ul>
    </div>
    <div class="trade-con-l-rec">
          @forelse($tjpostarr as $k=>$v2)   
                @if($k == 9)  
                    <a href="/{{$v2->ID}}.html" target="_blank">
    <div class="title">{{$v2->post_title}}</div>
    <div class="intro">{{$v2->seotitle}}</div>
    </a>
                 @endif
        @endforeach
    </div>
    <div class="trade-con-l-list">
    <ul>
        @forelse($tjpostarr as $k=>$v2)   
                @if($k>9 && $k < 16)  
                <li><a href="/{{$v2->ID}}.html" target="_blank">{{$v2->post_title}}</a></li>
                 @endif
        @endforeach
    </ul>
    </div>
    </div>
    <div class="item-card-list fr">
    <ul class="clearfix">
         @forelse(\Common::getPosts($v->term_id,'',9) as $v2)     
                 <li><a href="/{{$v2->ID}}.html" target="_blank"><img class="lazyload" data-original="{{$v2->images}}" alt="{{$v2->post_title}}">
                <div class="more">¥{{$v2->subtitle}}<i>了解详情</i></div>
                </a></li>
        @endforeach
    </ul>
    </div>
    </div>
    </div>
    </div>
    <div class="layout-r">
    <div class="item-rank">
    <div class="title">{{$v->name}}排行榜</div>
    <div class="con">
    <ul>
        @forelse($tjpostarr as $k=>$v2)   
                @if($k>15)  
                <li class="clearfix">
                <div class="number fl">{{$k-15}}</div>
                <div class="item-con fl">
                <div class="title"><a href="/{{$v2->ID}}.html" target="_blank">{{$v2->post_title}}</a></div>
                <div class="money">投资金额：<span>{{$v2->subtitle}}</span></div>
                </div>
                <div class="rank-img fr"> <a href="/{{$v2->ID}}.html" target="_blank"><img class="lazyload" data-original="{{$v2->images}}" alt="{{$v2->post_title}}"></a> </div>
                </li>
                 @endif
        @endforeach
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
@endforeach
<div class="warning">
<img src="/chuangye/warning.jpg" alt="">
</div>
<div class="media-link">
<div class="layout">

<div class="media-box clearfix">
<div class="title fl">广告热线</div>
<div class="con fr">17091425988(伍经理)</div>
</div>
<div class="media-box clearfix">
<div class="title fl">合作媒体</div>
<div class="con fr">
<ul>
  @forelse($linkarr as $k=>$v)   
<li><a href="{{$v->link_url}}" target="_blank">{{$v->link_name}}</a></li>
@endforeach
</ul>
</div>
</div>
<div class="media-box clearfix">
<div class="title fl">友情链接申明</div>
<div class="con fr">招商创业网诚邀广大媒体进行更为广泛的升入合作，我们将以更加灵活/丰富的形式宣传您的媒体，连锁加盟网热情期待您的加盟！</div>
</div>
</div>
</div>

<script src="/chuangye/swiper.min.js"></script>
<script>var mySwiper =new Swiper('.swiper-container',{autoplay:{delay:3000,disableOnInteraction:false,},loop :true,})
$(".jm-rank-con li").mouseover(function(){$(".jm-rank-con li").removeClass("active");$(this).addClass("active");})
$(function(){function main(){$(".dropdown li").hover(function(){$(this).addClass("active");},function(){$(this).removeClass("active");});}
main();});</script>
@stop