@extends('pc.frontend')
@section('headlibs')
<title>{{$lmarr->seo_title}}</title>
<meta name="keywords" content="{{$lmarr->seo_keys}}"/>
<meta name="description" content="{{$lmarr->seo_des}}"/>
<link rel="stylesheet" href="/chuangye/iconfont.css">
<link rel="stylesheet" href="/chuangye/pros.css">
@stop

@section('main_content')
<div class="trail">
<div class="layout">
<ul class="clearfix">
<li><a href="/">首页</a></li>
@if(!empty($fpath))
<li><a href="/{{$zflmarr->slug}}">{{$zflmarr->name}}</a></li>
@endif
<li><a>{{$lmarr->name}}</a></li>
</ul>
</div>
</div>
 @php
    $urls = \Request::path();
    $id='';
@endphp
<div class="trade-choose">
<div class="layout">
<div class="trade-choose-list clearfix">
<div class="title fl">行业分类：</div>
<div class="con fr">
<ul class="clearfix">
<li><a href="/xm">不限</a></li>
@forelse(\Common::getLanmus(12) as $v)  
    <li @if(strstr($urls,$v->slug)) class="active" @endif><a href="/{{$v->slug}}">{{$v->name}}</a></li>
@endforeach

</ul>
    <div class="con-little">
    <div class="con-little-box clearfix">
        @php
            if(!empty($fpath)){
                 $flid = $lmarr->parent;
                $planmu = '/'.$zflmarr->slug;
            }
            else{
                $flid = $lmarr->term_id;
                $planmu ="/".$lmarr->slug;
            }

        @endphp
        @forelse(\Common::getLanmus2($flid) as $v2)  
                <a class="subIndustry-choose" href="{{$planmu}}/{{$v2->slug}}" name="{{$v2->slug}}" @if($v2->slug==$lmarr->slug)style="background: rgb(230, 0, 18) none repeat scroll 0% 0%; color: rgb(255, 255, 255);" @endif>{{$v2->name}}</a> 
        @endforeach
    </div>
    </div>

</div>
</div>
 @if(!empty($fpath))
    <input type="hidden" id="pslug" value="{{$zflmarr->slug}}">
    <input type="hidden" id="pname" value="{{$zflmarr->name}}">
    <input type="hidden" id="lslug" value="{{$lmarr->slug}}">
    <input type="hidden" id="lname" value="{{$lmarr->name}}">
    <input type="hidden" id="curPage" value="{{$lmarr->term_id}}">
@else
    <input type="hidden" id="pslug" value="">
    <input type="hidden" id="pname" value="">
    <input type="hidden" id="lslug" value="{{$lmarr->slug}}">
    <input type="hidden" id="lname" value="{{$lmarr->name}}">
    <input type="hidden" id="curPage" value="{{$lmarr->term_id}}">
@endif
<div class="trade-choose-list money-choose-list clearfix">
<div class="title fl">投资金额：</div>
<div class="con fr">
<ul id="money-choose" class="clearfix">
{{-- <li class="active"><a href="javascript:void(0);" name="">不限</a></li> --}}
<li><a href="javascript:void(0);" name="0-1">1万以下</a></li>
<li><a href="javascript:void(0);" name="1-5">1~5万</a></li>
<li><a href="javascript:void(0);" name="5-10">5~10万</a></li>
<li><a href="javascript:void(0);" name="10-20">10~20万</a></li>
<li><a href="javascript:void(0);" name="20-50">20~50万</a></li>
<li><a href="javascript:void(0);" name="50-100">50~100万</a></li>
<li><a href="javascript:void(0);" name="100">100万以上</a></li>
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
<div class="fr">{{$lmarr->name}}共<span>{{$total}}</span>个匹配项目</div>
</div>
<div class="trade-rank-detail">
<ul>
 @foreach($pagelists as $k=>$v)
         <li class="clearfix">
            <div class="item-img fl"><a href="/{{$v->ID}}.html">
                  @if(!empty($v->images))
                        <img class="lazyload" data-original="{{$v->images}}">
                @else    
                 <img src="/chuangye/404.png">
                @endif
            </a></div>
            <div class="trade-rank-detail-con fl">
            <div class="title"><a href="/{{$v->ID}}.html" target="_blank">{{$v->post_title}}</a></div>
            <div class="company">{{str_replace("加盟","",$v->post_title)}}</div>
            <div class="con">{!! str_replace("补充：{无}","",str_limit(strip_tags($v->post_content),150)) !!}</div>
            <div class="label clearfix">
                @if(!empty($fpath))
                <a href="/{{$zflmarr->slug}}">{{$zflmarr->name}}</a>
                <a href="/{{$zflmarr->slug}}/{{$lmarr->slug}}" target="_blank">{{$lmarr->name}}</a>
                @else
                    <a href="/{{$lmarr->slug}}" target="_blank">{{$lmarr->name}}</a>
                @endif
            
            </div>
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
<div class="page-trun" id='page-trun'>
 @if(strstr(substr($pagelists->links(), -1),'/')==false)
        {!! str_replace('class="active"><span>','><span class="active">',str_replace('">','">',str_replace("?page=","/page/",$pagelists->links()))) !!}
        @endif
</div>
</div>
@php
 $hotProjectArr = \Common::getPosts('-2','',10); 
    if(!empty($fpath))
        $tuijProjectArr = \Common::getPosts($lmarr->parent,'',6); 
    else
        $tuijProjectArr = \Common::getPosts($lmarr->term_id,'',6); 
   
@endphp
<div class="layout-trade-r">
<div class="jm-rank trade-jm-rank">
<div class="title">加盟排行榜</div>
<div class="jm-rank-con">
<ul>
  @forelse($hotProjectArr as $k=> $v)
      <li class="clearfix">
    <div class="number fl">{{$k+1}}</div>
    <div class="list fl">
    <div class="jm-rank-con-title"><a href="/{{$v->ID}}.html">{{$v->post_title}}</a></div>
    </div>
    <div class="mark fr">{{$v->subtitle}}</div>
    </li>
@endforeach    
</ul>
</div>
</div>
<div class="hot-info mt20">
<div class="title">推荐项目</div>
<div class="con">
<ul>
    @forelse($tuijProjectArr as $k=> $v)
        <li><a href="/{{$v->ID}}.html" target="_blank">{{$v->post_title}}</a></li>
    @endforeach    
</ul>
</div>
</div>
<div class="hot-info mt20">
@include('pc.hidden')
</div>
</div>
</div>

<script type="text/javascript">
$(function() {
    $('#money-choose').children().click(function() {
        var term_id = $("#curPage").val();
        var pslug = $("#pslug").val();
        var pname = $("#pname").val();
        var lslug = $("#lslug").val();
        var lname = $("#lname").val();
        var moneyCode = $(this).children().attr("name");
        $("#moneyCode").val(moneyCode);
        $("#money-choose").children().removeClass();
        $(this).addClass("active");

        $.ajax({
            url: '/ajax/mjiansuo',
            type: 'get',
            dataType: 'html',
            data: '&subtitle=' + moneyCode + '&term_id=' + term_id + '&pslug=' + pslug + '&pname=' + pname + '&lslug=' + lslug + '&lname=' + lname,
            success: function(data) {

                var fmeat = $('.trade-rank-detail > ul').eq(0);
                // var fmeat2 = $('.page-trun').eq(0);
                
                //alert(fmeat2.html());
                fmeat.html(data)
                if(moneyCode!='')
                    document.getElementById("page-trun").style.display="none";
                else 
                    document.getElementById("page-trun").style.display="block";
                
                
                    // fmeat2.html('')
                    
              
                 
               
                // $("#morebrand").html(data);
                // $("#defaultrank").addClass("active");
            },
            error: function() {}
        });
    });
});

</script>
@stop