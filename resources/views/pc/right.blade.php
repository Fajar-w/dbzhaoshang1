@php
 $hotProjectArr = \Common::getPosts('-2','',10); 
 $tuijProjectArr = \Common::getPosts('-4','',6); 
@endphp


@if(strstr(\Request::path(),'search') || strstr(\Request::path(),'tag/'))

    <div class="layout-trade-r">
    <div class="jm-rank trade-jm-rank">
    <div class="title">加盟排行榜</div>
    <div class="jm-rank-con">
    <ul>
      @forelse($hotProjectArr as $k=> $v)
          <li class="clearfix">
        <div class="number fl">{{$k+1}}</div>
        <div class="list fl">
        <div class="jm-rank-con-title"><a href="/{{$v->ID}}.html" target="_blank">{{$v->post_title}}</a></div>
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
    </div>

@else

    <div class="layout-info-r">
    <div class="hot-info">
    <div class="title">招商创业网</div>
    <div class="con">
    <ul>
         <li><a href="/">home</a></li>
        <li><a href="/mianze" @if($path =='mianze') style='color: red;'@endif>免责声明</a></li>
        <li><a href="/women"  @if($path =='women') style='color: red;'@endif>关于我们</a></li>
        <li><a href="/tousu"  @if($path =='tousu') style='color: red;'@endif>内容修正（删除）申请</a></li>
        <li><a href="/tags">标签云</a></li>
        <li><a href="/map">网站地图</a></li>
    </ul>
    </div>
    </div>
    <div class="ad-info-r">
    <ul>
     @forelse($tuijProjectArr as $k=> $v)
    <li><a href="/{{$v->ID}}.html"><img src="@if($v->images=='')/chuangye/404.png @else {{$v->images}}@endif" alt="{{$v->post_title}}"></a></li>
    @endforeach
    </ul>
    </div>
    </div>

@endif    



    
    {{-- <div class="widget widget_ui_tags">
        <h3>推荐标签</h3>
        <div class="items">
            @forelse(\Common::HotgetTags() as $k=> $v)
                         <a href="http://www.imnotdoubi.test/tag/{{$v->slug}}">{{$v->name}}</a>
                     @endforeach
        </div>
    </div> --}}
