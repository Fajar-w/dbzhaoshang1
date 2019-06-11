@extends('wap.mobile')
@section('headlibs')
<title>{{$indexInfos->seo_title}}</title>
<meta name="keywords" content="{{$indexInfos->seo_keys}}">
<meta name="description" content="{{$indexInfos->seo_des}}">
@stop
@section('main_content')
@include('wap.topsearch')
<div class="swiper-container top-swiper">
<div class="swiper-wrapper">
<div class="swiper-slide"><img src="/chuangye/wap/1.jpg"></div>
<div class="swiper-slide"><img src="/chuangye/wap/2.jpg"></div>
{{-- <div class="swiper-slide"><img src="http://img.jiameng.cn/2018/08/dLylmgqXhi.png"></div> --}}
</div>
</div>
<script>var mySwiper =new Swiper ('.swiper-container',{direction:'horizontal',loop:true,autoplay :2000,autoplayDisableOnInteraction :false,})
</script>

@include('wap.top')

<div class="card hot-item">
<div class="layout">
<div class="card-title">热门推荐</div>
<div class="card-con">
<ul>

@forelse($arcArrConTej as $k=> $v)
            <li>
            <div class="img"> <a href="/{{$v->ID}}.html">
            <img src="{{$v->images}}" style="height:159px"></img>
            </a> </div>
            <div class="info">
            <div class="title"><a href="/{{$v->ID}}.html">
            <h3>{{$v->post_title}}</h3>
            </a></div>
            <div class="con"><em>{{$v->subtitle}}</em></div>
            <div class="con"><span>{{$v->views}}</span>人预览</div>
            </div>
            </li>

    @endforeach
</ul>
</div>
</div>
<div class="more-btn"><a href="/canyin">更多热门项目</a></div>
</div>

<div class="card jm-info">
<div class="layout">
<div class="card-title">加盟知识</div>
<div class="card-con">
<ul>
     @forelse($hyzsArc as $k=> $v)
            <li> <a href="/news/{{$v->ID}}.html">{{$v->post_title}} </a></li>
     @endforeach
</ul>
</div>
</div>
<div class="more"><a href="/">查看更多加盟商机</a></div>
</div>
<div class="card jm-info">
<div class="layout">
<div class="card-title">加盟商机</div>
<div class="card-con">
<ul>
@forelse($cyglArc as $k=> $v)
            <li><a href="/news/{{$v->ID}}.html">{{$v->post_title}} </a></li>
     @endforeach
</ul>
</div>
</div>
<div class="more"><a href="/">查看更多加盟商机</a></div>
</div>
@stop