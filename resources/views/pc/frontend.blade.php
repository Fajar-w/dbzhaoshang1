<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="apple-mobile-web-app-title" content="招商创业网">
<link rel="shortcut icon" href="/chuangye/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" href="/chuangye/reset.css">
<link rel="stylesheet" href="/chuangye/common.css">
<script type="text/javascript" src="/chuangye/jquery-3.3.1.min.js"></script>
@yield('headlibs')
<meta http-equiv="mobile-agent" content="format=wml; url=http://m.imnotdoubi.test{{Request::getrequesturi()}}" />
<meta http-equiv="mobile-agent" content="format=xhtml; url=http://m.imnotdoubi.test{{Request::getrequesturi()}}" />
<meta http-equiv="mobile-agent" content="format=html5; url=http://m.imnotdoubi.test{{Request::getrequesturi()}}" />
<link rel="alternate" media="only screen and(max-width: 640px)" href="http://m.imnotdoubi.test{{Request::getrequesturi()}}" >
<link rel="canonical" href="http://www.imnotdoubi.test{{Request::getrequesturi()}}"/>
<script type="text/javascript">
    function goSearch(){
        var wd =$("#keyWord").val();
        if(!wd){return false;}
        else{
            window.location.href="/search/?s=" + wd;
        }
}
</script>
</head>
<body>
<div class="header">
<div class="header-top">
<div class="layout clearfix">
<div class="fl"> <a href="/">首页</a> <a href="/women">关于我们</a> <a href="/mianze">免责声明</a> <a href="/tousu">内容修正（删除）</a>
    {{-- <a href="/tags">标签云</a><a href="/map">网站地图</a>  --}}
</div>
<div class='fr'> <a href="javascript:alert('当前浏览器不支持，你可以按ctrl+d 快捷键添加收藏！')">收藏</a> </div>
</div>
</div>
<div class="header-con">
<div class="layout clearfix">
<div class="logo fl"><a href="/"><img src="/chuangye/logo-1.png" alt=""></a></div>
<div class="search fl">
     
<div class="search-box clearfix">
<input type="text" placeholder="输入您感兴趣的项目名称" id="keyWord">
<button onclick="goSearch()">搜索</button> <i class="icon"></i> 
</div>
<div class="search-tips"> <span>热门项目：</span>
     @forelse(\Common::getPosts('-4','',3) as $v2)     
                <a href="/{{$v2->ID}}.html">{{$v2->post_title}}</a>
        @endforeach
</div>
</div>
<div class="enter-item fl"> <a href="/xm" target="_blank"> <i class="icon"></i> <span>项目</span> </a> </div>
<div class="enter-info fr"> <a href="/news" target="_blank"> <i class="icon"></i> <span>资讯</span> </a> </div>
</div>
</div>
</div>
@php
    $path = \Request::path();
@endphp
<div class="navbar">
<div class="layout">
<ul class="clearfix">
@if($path=='/' || $path=='')
<li class="downbtn"><a href="javascript:;" class="active"><i class="icon"></i>项目分类</a></li>
@endif
<li><a href="/">首页</a></li>
<li><a href="/xm">热门项目</a></li>
<li><a href="/news">加盟资讯</a></li>
</ul>
</div>
</div>
@yield('main_content')
<div class="hr2"></div>
<div id="footer-v1" style="position:relative">
<div class="layout">
<div class="footer-container">
<div class="net-admission fd-clr">
<ul>
<li><a href="http://www.imnotdoubi.test/women">关于我们</a></li>
<li>
Copyright &copy; 2017-2019 <a href="http://www.imnotdoubi.test">招商创业网</a> www.imnotdoubi.test 创业，我帮您。版权所有 投资有风险，加盟需谨慎！
</li>
</ul>
</div>
{{-- <div class="footer-jm-copyright">
<p>版权所有泰州前沿信息科技有限公司&nbsp;&nbsp;投资有风险 加盟需谨慎&nbsp;&nbsp;全国服务热线：400-111-2221（免长途费）</p>
</div> --}}
</div>
</div>
</div>

<script type="text/javascript">function addfavorite() {try {window.external.addFavorite('http://www.imnotdoubi.test','招商创业网');}
catch (e) {try {window.sidebar.addPanel('招商创业网','http://www.imnotdoubi.test',"");}
catch (e) {alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");}
}
}
</script>
<script type="text/javascript" src="/chuangye/jquery.lazyload.js"></script>
<script type="text/javascript">
    $(function() {
          $("img.lazyload").lazyload({
            placeholder : "/chuangye/moren.jpg",
            effect: "fadeIn"});

      });

</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?5abbb163933cc109334edcece71128cf";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>