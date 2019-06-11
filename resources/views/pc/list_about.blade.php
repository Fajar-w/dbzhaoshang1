@extends('pc.frontend')
@section('headlibs')
<title>{{$abouts->post_title}}-招商创业网</title>
<meta name="keywords" content="{{$abouts->post_title}}"/>
<meta name="description" content="{!! str_limit(strip_tags($abouts->post_content),150) !!}"/>
@stop
@if(\Request::path() =='map')
    @section('main_content')
    <link href="/chuangye/reset1.css" rel="stylesheet">
<link href="/chuangye/reset2.css" rel="stylesheet">
    <section class="container" id="navs" >
   <div class="items">

      @forelse(\Common::getLanmus(14) as $v)
            <div class="item">
                <h2>{{$v->name}}</h2>
                <ul class="xoxo blogroll">
                    @forelse(\Common::arctypeTopid($v->term_id) as $v2)
                    <li><a href="/{{$v->slug}}@if($v2->parent!=0)/{{$v2->slug}}@endif" title="{{$v2->seo_title}}" target="_blank">{{$v2->name}}</a><br>
                    {{$v2->description}}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
   </div>
  </section>

    @stop

@elseif(\Request::path() =='tags')
 <link href="/chuangye/reset1.css" rel="stylesheet">
<link href="/chuangye/reset2.css" rel="stylesheet">
     @section('main_content')
    <div class="container container-tags">
    <h1>标签云</h1>
    <div class="tagslist">
        <ul>
            <li><a class="name" href="/tag/%e8%a1%8c%e4%b8%9a%e8%b5%84%e8%ae%af">行业资讯</a>
            <p>
                <a class="tit" href="/78056.html">2018保暖内衣十大品牌排行榜介绍</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%8a%a0%e7%9b%9f%e8%b4%b9">加盟费</a>
            <p>
                <a class="tit" href="/93786.html">资生堂化妆品诚邀加盟</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%8a%a0%e7%9b%9f%e7%94%b5%e8%af%9d">加盟电话</a>
            <p>
                <a class="tit" href="/93786.html">资生堂化妆品诚邀加盟</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%8a%a0%e7%9b%9f%e6%b5%81%e7%a8%8b">加盟流程</a>
            <p>
                <a class="tit" href="/93786.html">资生堂化妆品诚邀加盟</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%8a%a0%e7%9b%9f%e6%9d%a1%e4%bb%b6">加盟条件</a>
            <p>
                <a class="tit" href="/93786.html">资生堂化妆品诚邀加盟</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%80%8e%e4%b9%88%e6%a0%b7">怎么样</a>
            <p>
                <a class="tit" href="/93786.html">资生堂化妆品诚邀加盟</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%ae%98%e7%bd%91">官网</a>
            <p>
                <a class="tit" href="/51748.html">学大阳光兔诚邀加盟</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%b0%b1%e8%a6%81%e5%8a%a0%e7%9b%9f%e7%bd%91">就要加盟网</a>
            <p>
                <a class="tit" href="/120222.html">金福祥加盟</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b39%e6%9c%88%e4%bc%98%e6%83%a0%e6%b4%bb%e5%8a%a8">麦当劳9月优惠活动</a>
            <p>
                <a class="tit" href="/20714.html">麦当劳(东门餐厅)甜品第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81%e6%9c%8d%e5%8a%a1">淘宝会员码服务</a>
            <p>
                <a class="tit" href="/24056.html">淘宝玛格全屋定制会员码能享受什么优惠</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%b7%98%e5%ae%9d%e5%93%81%e7%89%8c%e4%bc%9a%e5%91%98%e7%a0%81">淘宝品牌会员码</a>
            <p>
                <a class="tit" href="/21398.html">淘宝梦洁宝贝会员码有什么用</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81">淘宝会员码</a>
            <p>
                <a class="tit" href="/24056.html">淘宝玛格全屋定制会员码能享受什么优惠</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81%e6%9d%83%e7%9b%8a">淘宝会员码权益</a>
            <p>
                <a class="tit" href="/24056.html">淘宝玛格全屋定制会员码能享受什么优惠</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e8%bd%a6%e9%99%a9%e6%8a%95%e4%bf%9d">车险投保</a>
            <p>
                <a class="tit" href="/24050.html">粤A牌龙溪周边买汽车保险哪间保险公司好</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%89%8d%e6%99%af">前景</a>
            <p>
                <a class="tit" href="/15367.html">金线莲的种植前景</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e7%b2%a4a%e7%89%8c%e8%bd%a6%e9%99%a9%e6%8a%95%e4%bf%9d">粤A牌车险投保</a>
            <p>
                <a class="tit" href="/24050.html">粤A牌龙溪周边买汽车保险哪间保险公司好</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%b9%bf%e5%b7%9e%e7%89%8c%e8%bd%a6%e9%99%a9%e6%8a%95%e4%bf%9d">广州牌车险投保</a>
            <p>
                <a class="tit" href="/21648.html">粤A牌南岸附近哪里有汽车保险买</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%b9%bf%e5%b7%9e%e8%bd%a6%e9%99%a9">广州车险</a>
            <p>
                <a class="tit" href="/24050.html">粤A牌龙溪周边买汽车保险哪间保险公司好</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%b9%bf%e5%b7%9e%e6%b1%bd%e8%bd%a6%e4%bf%9d%e9%99%a9">广州汽车保险</a>
            <p>
                <a class="tit" href="/21648.html">粤A牌南岸附近哪里有汽车保险买</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e7%a7%8d%e6%a4%8d">种植</a>
            <p>
                <a class="tit" href="/21354.html">湖南适合种植什么水果</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%8f%8c11">双11</a>
            <p>
                <a class="tit" href="/41589.html">2018年阿里云双11老用户如何购买双11拼团阿里云产品？</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81%e5%8a%9f%e8%83%bd">淘宝会员码功能</a><small>×48</small>
            <p>
                <a class="tit" href="/24056.html">淘宝玛格全屋定制会员码能享受什么优惠</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91">阿里云</a>
            <p>
                <a class="tit" href="/44717.html">在阿里云新购突发性能实例t5最多可以备案多少个网站</a>
            </p>
            </li>
            <li><a class="name" href="/tag/iphone%e6%96%b0%e5%93%81%e9%a2%84%e7%ba%a6">iphone新品预约</a>
            <p>
                <a class="tit" href="/22767.html">苹果XR和XS用的处理器一样吗</a>
            </p>
            </li>
            <li><a class="name" href="/tag/iphone%e6%96%b0%e6%ac%be%e9%a2%84%e7%ba%a6">iphone新款预约</a>
            <p>
                <a class="tit" href="/22768.html">苹果xsmax发售当天实体店有吗</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e8%8d%89%e8%8e%93%e6%b4%be%e5%8d%8a%e4%bb%b7%e4%bc%98%e6%83%a0">麦当劳草莓派半价优惠</a>
            <p>
                <a class="tit" href="/20706.html">麦当劳(丰兴商业广场餐厅)草莓派第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e8%8d%89%e8%8e%93%e6%b4%be%e7%ac%ac2%e4%bb%bd%e5%8d%8a%e4%bb%b7">麦当劳草莓派第2份半价</a>
            <p>
                <a class="tit" href="/20713.html">麦当劳(花园街餐厅)草莓派第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e8%b5%9a%e9%92%b1">赚钱</a>
            <p>
                <a class="tit" href="/21353.html">2018种植香菜赚钱吗</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%85%bb%e6%ae%96">养殖</a>
            <p>
                <a class="tit" href="/13976.html">虫子鸡养殖的前景</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91ftp%e8%bf%9e%e6%8e%a5%e5%a4%b1%e8%b4%a5">阿里云ftp连接失败</a>
            <p>
                <a class="tit" href="/20721.html">阿里云搭建的ftp无法访问如何处理</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e8%8d%89%e8%8e%93%e6%b4%be%e7%ac%ac%e4%ba%8c%e4%bb%bd%e5%8d%8a%e4%bb%b7">麦当劳草莓派第二份半价</a>
            <p>
                <a class="tit" href="/20713.html">麦当劳(花园街餐厅)草莓派第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91ftp%e6%95%85%e9%9a%9c">阿里云ftp故障</a>
            <p>
                <a class="tit" href="/20721.html">阿里云搭建的ftp无法访问如何处理</a>
            </p>
            </li>
            <li><a class="name" href="/tag/2018iphone%e9%a2%84%e7%ba%a6">2018iphone预约</a>
            <p>
                <a class="tit" href="/22752.html">苹果xrmax好久开始预定</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e9%99%90%e6%97%b610%e5%85%83%e5%b7%a8%e6%97%a0%e9%9c%b8">麦当劳限时10元巨无霸</a>
            <p>
                <a class="tit" href="/20715.html">麦当劳(优托邦店)经典巨无霸限时10元</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91%e6%9c%8d%e5%8a%a1%e5%99%a8%e5%bc%82%e5%b8%b8">阿里云服务器异常</a>
            <p>
                <a class="tit" href="/20718.html">阿里云托管ftp连不上怎么处理</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%b3%e6%be%84%e6%b9%96%e5%a4%a7%e9%97%b8%e8%9f%b92018%e4%bb%b7%e6%a0%bc">阳澄湖大闸蟹2018价格</a>
            <p>
                <a class="tit" href="/12267.html">今年阳澄湖大闸蟹多少钱一只</a>
            </p>
            </li>
            <li><a class="name" href="/tag/iphone%e9%a2%84%e7%ba%a6">iphone预约</a>
            <p>
                <a class="tit" href="/22122.html">iphone预购多久会到</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e7%bd%91%e7%ab%99%e9%a6%96%e9%a1%b5%e6%89%93%e5%bc%80%e6%85%a2">网站首页打开慢</a>
            <p>
                <a class="tit" href="/19753.html">电脑打开网站速度慢怎么样解决访问更快</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91ftp%e5%bc%82%e5%b8%b8">阿里云ftp异常</a>
            <p>
                <a class="tit" href="/20718.html">阿里云托管ftp连不上怎么处理</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e7%bb%8f%e5%85%b8%e5%b7%a8%e6%97%a0%e9%9c%b8%e9%99%90%e6%97%b610%e5%85%83">麦当劳经典巨无霸限时10元</a>
            <p>
                <a class="tit" href="/20715.html">麦当劳(优托邦店)经典巨无霸限时10元</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e6%a1%83%e6%a1%83%e4%b9%8c%e7%b3%bb%e5%88%97%e5%8d%8a%e4%bb%b7">麦当劳桃桃乌系列半价</a>
            <p>
                <a class="tit" href="/20712.html">麦当劳(新洲南路餐厅)甜品第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%b3%e6%be%84%e6%b9%96%e5%a4%a7%e9%97%b8%e8%9f%b9%e5%a4%9a%e5%b0%91%e9%92%b1">阳澄湖大闸蟹多少钱</a>
            <p>
                <a class="tit" href="/9379.html">德宏阳澄湖大闸蟹大概多少钱</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91%e6%95%b0%e6%8d%ae%e5%ba%93">阿里云数据库</a>
            <p>
                <a class="tit" href="/23090.html">阿里云数据库怎么恢复默认密码</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e8%8d%89%e8%8e%93%e6%b4%be%e5%8d%8a%e4%bb%b7">麦当劳草莓派半价</a>
            <p>
                <a class="tit" href="/20705.html">麦当劳(长安分店甜品站)草莓派第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91%e6%9c%8d%e5%8a%a1%e5%99%a8">阿里云服务器</a>
            <p>
                <a class="tit" href="/22778.html">汉中用户购买服务器如何选择</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91rds%e6%95%b0%e6%8d%ae%e5%ba%93%e8%bf%9e%e6%8e%a5">阿里云rds数据库连接</a>
            <p>
                <a class="tit" href="/12827.html">阿里云云数据库年费多少</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%bf%e9%87%8c%e4%ba%91ftp%e9%94%99%e8%af%af">阿里云ftp错误</a>
            <p>
                <a class="tit" href="/20721.html">阿里云搭建的ftp无法访问如何处理</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e8%8b%b9%e6%9e%9ciphone%e9%a2%84%e7%ba%a6">苹果iphone预约</a>
            <p>
                <a class="tit" href="/22125.html">iphonexsmax在店里能直接买吗</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e7%94%9c%e5%93%81%e7%ac%ac%e4%ba%8c%e4%bb%bd%e5%8d%8a%e4%bb%b7">麦当劳甜品第二份半价</a>
            <p>
                <a class="tit" href="/20714.html">麦当劳(东门餐厅)甜品第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e7%94%9c%e5%93%81%e7%ac%ac2%e4%bb%bd%e5%8d%8a%e4%bb%b7">麦当劳甜品第2份半价</a>
            <p>
                <a class="tit" href="/20714.html">麦当劳(东门餐厅)甜品第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e7%94%9c%e5%93%81%e5%8d%8a%e4%bb%b7%e4%bc%98%e6%83%a0">麦当劳甜品半价优惠</a>
            <p>
                <a class="tit" href="/20712.html">麦当劳(新洲南路餐厅)甜品第二份半价</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%9c%89%e4%ba%9b%e7%bd%91%e7%ab%99%e6%89%93%e5%bc%80%e6%85%a2">有些网站打开慢</a>
            <p>
                <a class="tit" href="/12871.html">为什么我上网站这么慢有什么方法访问更快</a>
            </p>
            </li>
            <li><a class="name" href="/tag/2018%e9%98%b3%e6%be%84%e6%b9%96%e5%a4%a7%e9%97%b8%e8%9f%b9%e4%bb%b7%e6%a0%bc">2018阳澄湖大闸蟹价格</a>
            <p>
                <a class="tit" href="/9379.html">德宏阳澄湖大闸蟹大概多少钱</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e4%b8%ad%e5%9b%bd">中国</a>
            <p>
                <a class="tit" href="/36613.html">中国人保将发行18亿A股 每股价格3.34元</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e7%bd%91%e7%ab%99%e6%89%93%e5%bc%80%e7%89%b9%e5%88%ab%e6%85%a2">网站打开特别慢</a>
            <p>
                <a class="tit" href="/19748.html">网站焦点图太大导致打开国慢有哪些加速技巧</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%9c%89%e4%ba%9b%e7%bd%91%e7%ab%99%e7%89%b9%e5%88%ab%e6%85%a2">有些网站特别慢</a>
            <p>
                <a class="tit" href="/17071.html">有什么方法处理有些网站登录慢</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e9%98%b3%e6%be%84%e6%b9%96%e5%a4%a7%e9%97%b8%e8%9f%b9%e5%94%ae%e4%bb%b7">阳澄湖大闸蟹售价</a>
            <p>
                <a class="tit" href="/12267.html">今年阳澄湖大闸蟹多少钱一只</a>
            </p>
            </li>
            <li><a class="name" href="/tag/2018%e5%9b%bd%e5%ba%86%e5%81%87%e6%9c%9f%e6%97%85%e6%b8%b8">2018国庆假期旅游</a>
            <p>
                <a class="tit" href="/16177.html">2018国庆节旅游去哪儿比较好</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81%e7%bb%91%e5%ae%9a">淘宝会员码绑定</a>
            <p>
                <a class="tit" href="/23658.html">乡村基淘宝会员码怎么绑定</a>
            </p>
            </li>
            <li><a class="name" href="/tag/%e5%85%ac%e5%8f%b8">公司</a>
            <p>
                <a class="tit" href="/36459.html">回购制度迎重大改革 超3万亿元资金入市在望</a>
            </p>
            </li>
        </ul>
    </div>
</div>
 @stop
@else
   @section('main_content')
    <div class="trail">
    <div class="layout">
    <ul class="clearfix">
    <li><a href="/">招商创业网</a></li>
    <li><a>{{$abouts->post_title}}</a></li>
    </ul>
    </div>
    </div>
    <div class="layout clearfix">
    <div class="layout-info-l">
    <div class="info-article">
    <div class="title"><h1  style="text-align: center;font-size: 26px">{{$abouts->post_title}}</h1></div>
    <div class="con">
          {!! $abouts->post_content !!}
    </div>
    </div>
    </div>
    @include('pc.right')
    </div>
    @stop

@endif
