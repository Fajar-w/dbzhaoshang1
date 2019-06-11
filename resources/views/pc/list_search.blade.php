@extends('pc.frontend')
@section('headlibs')
<title>搜索结果 {{$post_jstitle}}-招商创业网</title>
<meta name="keywords" content="{{$post_jstitle}}"/>
<meta name="description" content="招商创业网: '{{$post_jstitle}}' 的搜索結果"/>
<link rel="stylesheet" href="/chuangye/iconfont.css">
<link rel="stylesheet" href="/chuangye/pros.css">
@stop

@section('main_content')
<div class="trail">
<div class="layout">
<ul class="clearfix">
<li><a href="/">首页</a></li>

<li><a>{{$post_jstitle}}</a></li>
</ul>
</div>
</div>
 @php
    $urls = \Request::path();
@endphp
<div class="trade-choose">
<div class="layout">
<div class="trade-choose-list clearfix">
<div class="title fl">行业分类：</div>
<div class="con fr">
<ul class="clearfix">
{{-- <li><a href="/xiangmu/">不限</a></li> --}}
@forelse(\Common::getLanmus(12) as $v)  
    <li @if(strstr($urls,$v->slug)) class="active" @endif><a href="/{{$v->slug}}">{{$v->name}}</a></li>
@endforeach

</ul>
</div>
</div>

</div>
</div>


<div class="layout clearfix mt20">
<div class="layout-trade-l" id="morebrand">
<div class="trade-rank">
<div class="trade-rank-choose clearfix">
<div class="fl clearfix"> <a href="javascript:void(0);" class="active">默认排序</a> </div>
<div class="fr">{{$post_jstitle}} 的最新50个搜索结果</div>
</div>
<div class="trade-rank-detail">
<ul>
 @foreach($pagelists as $k=>$v)
         <li class="clearfix">
            <div class="item-img fl"><a href="/{{$v->ID}}.html" target="_blank">
                  @if(!empty($v->images))
                    <img src="{{$v->images}}">
                @else    
                 <img src="/chuangye/404.png">
                @endif
            </a></div>
            <div class="trade-rank-detail-con fl">
            <div class="title"><a href="/{{$v->ID}}.html" target="_blank">{{$v->post_title}}</a></div>
            <div class="company">{{str_replace("加盟","",$v->post_title)}}</div>
            <div class="con">{!! str_replace("补充：{无}","",str_limit(strip_tags($v->post_content),150)) !!}</div>
            {{-- <div class="label clearfix">
                @if(!empty($fpath))
                <a href="/{{$zflmarr->slug}}">{{$zflmarr->name}}</a>
                <a href="/{{$zflmarr->slug}}/{{$lmarr->slug}}" target="_blank">{{$lmarr->name}}</a>
                @else
                    <a href="/{{$lmarr->slug}}" target="_blank">{{$lmarr->name}}</a>
                @endif
            
            </div> --}}
            </div>
            <div class="trade-rank-enter fr">
            <div class="money">
            <div>投资额</div>
            <span>{{$v->subtitle}}</span> </div>
            <div class="trade-rank-enter-btn"><a href="/{{$v->ID}}.html#liuyan" rel="pop_msg" class="bpopup" data-brand="jicyigyxz">申请加盟</a></div>
            <div class="more"><a href="/{{$v->ID}}.html" target="_blank">查看详情&gt;&gt;</a></div>
            </div>
        </li>
        @endforeach    
</ul>
</div>
</div>

</div>
@include('pc.right')
</div>

<script>
        var rep =/{{isset($post_jstitle) ? join('|',preg_split('//u', $post_jstitle, null, PREG_SPLIT_NO_EMPTY)):''}}/ig;
            $('.trade-rank-detail-con div a').each(function () {
                $(this).html($(this).text().replace(rep, function (a) {
                    return a.fontcolor('red');
                }));
            });
    </script>
@stop