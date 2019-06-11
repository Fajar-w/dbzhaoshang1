@extends('wap.mobile')
@section('headlibs')
<title>{{$lmarr->seo_title}}</title>
<meta name="keywords" content="{{$lmarr->seo_keys}}"/>
<meta name="description" content="{{$lmarr->seo_des}}"/>
@stop
@section('main_content')
@include('wap.topsearch')
@php
    $pathurl = \Request::path();
@endphp
@if($pathurl =='news')
    <div class="card jm-info">
    <div class="layout">
    <div class="card-title">加盟知识</div>
    <div class="card-con">
    <ul>
          @foreach($jmzs as $k=>$v)

                <li> <a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></li>
            @endforeach    
    </ul>
    </div>
    </div>
    <div class="more"><a href="/news/zhishi">查看更多加盟商机</a></div>
    </div>
    <div class="card jm-info">
    <div class="layout">
    <div class="card-title">加盟商机</div>
    <div class="card-con">
    <ul>
    @foreach($jmsj as $k=>$v)

                <li> <a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></li>
            @endforeach    

    </ul>
    </div>
    </div>
    <div class="more"><a href="/news/shangji">查看更多加盟商机</a></div>
    </div>
@else
    <div class="card jm-info">
    <div class="layout">
    <div class="card-title">{{$lmarr->name}}</div>
    <div class="card-con">
    <ul>
         @foreach($pagelists as $k=>$v)

                <li> <a href="/news/{{$v->ID}}.html">{{$v->post_title}}</a></li>
            @endforeach    
    </ul>
    </div>
    </div>
    </div>
    <div class="page-choose">
        @php
        if(!empty($fpath)){
            $planmu = '/'.$zflmarr->slug."/".$lmarr->slug;
        }
        else{
            $planmu ="/".$lmarr->slug;
        }
    @endphp
    <a @if($page==1)href="javascript:void(0);"@else href="{{$planmu}}/page/{{$page-1}}" @endif class="prev">上一页</a>
    <span class="page-number"><i>{{$page}}</i>/{{ceil($total/10)}}</span>
    <a @if($page==$total)href="javascript:void(0);"@else href="{{$planmu}}/page/{{$page+1}}"  @endif class="next">下一页</a>

    </div>
@endif
@stop