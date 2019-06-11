<div class="title">推荐</div>
<div class="title1">显示更多</div>
<div class="con">
<ul  class="list123">
    @php
 $zxNewsArr = \Common::hiddenNews('-1',6); 
 $tjNewsArr = \Common::hiddenNews('-3',6); 
$hotproArr = \Common::hiddenNews('-4',6); 
@endphp
@forelse($zxNewsArr as $k=> $v)
        <li><a href="/{{$v->ID}}.html">{{$v->post_title}}</a></li>
 @endforeach
 @forelse($tjNewsArr as $k=> $v)
        <li><a href="/{{$v->ID}}.html">{{$v->post_title}}</a></li>
 @endforeach


  @forelse($hotproArr as $k=> $v)
        <li><a href="/{{$v->ID}}.html">{{$v->post_title}}</a></li>
 @endforeach
 </ul>
</div>
<div class="con">
<ul  class="list1233">
 @if($id)
            @forelse(\Common::hiddenNews('-2',14) as $v)
                    @forelse(\Common::arctypeTopid($v->term_id) as $v2)
                    <li><a href="/{{$v->slug}}@if($v2->parent!=0)/{{$v2->slug}}@endif">{{$v2->name}}</a></li>
                    @endforeach
   
        @endforeach
 @endif
  <li><a href="http://www.imnotdoubi.test/tag/%e8%a1%8c%e4%b8%9a%e8%b5%84%e8%ae%af">行业资讯</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%8a%a0%e7%9b%9f%e8%b4%b9">加盟费</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%8a%a0%e7%9b%9f%e7%94%b5%e8%af%9d">加盟电话</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%8a%a0%e7%9b%9f%e6%b5%81%e7%a8%8b">加盟流程</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%8a%a0%e7%9b%9f%e6%9d%a1%e4%bb%b6">加盟条件 (3071)</a></li><li><a href="http://www.imnotdoubi.test/tag/%e6%80%8e%e4%b9%88%e6%a0%b7">怎么样</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%ae%98%e7%bd%91">官网</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%b0%b1%e8%a6%81%e5%8a%a0%e7%9b%9f%e7%bd%91">就要加盟网</a></li><li><a href="http://www.imnotdoubi.test/tag/%e9%ba%a6%e5%bd%93%e5%8a%b39%e6%9c%88%e4%bc%98%e6%83%a0%e6%b4%bb%e5%8a%a8">麦当劳9月</a></li><li><a href="http://www.imnotdoubi.test/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81%e6%9c%8d%e5%8a%a1">淘宝会员码</a></li><li><a href="http://www.imnotdoubi.test/tag/%e6%b7%98%e5%ae%9d%e5%93%81%e7%89%8c%e4%bc%9a%e5%91%98%e7%a0%81">淘宝品牌</a></li><li><a href="http://www.imnotdoubi.test/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81">淘宝会员码</a></li><li><a href="http://www.imnotdoubi.test/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81%e6%9d%83%e7%9b%8a">淘宝会员码</a></li><li><a href="http://www.imnotdoubi.test/tag/%e8%bd%a6%e9%99%a9%e6%8a%95%e4%bf%9d">车险投保</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%89%8d%e6%99%af">前景</a></li><li><a href="http://www.imnotdoubi.test/tag/%e7%b2%a4a%e7%89%8c%e8%bd%a6%e9%99%a9%e6%8a%95%e4%bf%9d">粤A牌车险投保</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%b9%bf%e5%b7%9e%e7%89%8c%e8%bd%a6%e9%99%a9%e6%8a%95%e4%bf%9d">广州牌车险</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%b9%bf%e5%b7%9e%e8%bd%a6%e9%99%a9">广州车险</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%b9%bf%e5%b7%9e%e6%b1%bd%e8%bd%a6%e4%bf%9d%e9%99%a9">广州汽车保险</a></li><li><a href="http://www.imnotdoubi.test/tag/%e7%a7%8d%e6%a4%8d">种植</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%8f%8c11">双11</a></li><li><a href="http://www.imnotdoubi.test/tag/%e6%b7%98%e5%ae%9d%e4%bc%9a%e5%91%98%e7%a0%81%e5%8a%9f%e8%83%bd">淘宝会员码</a></li><li><a href="http://www.imnotdoubi.test/tag/%e9%98%bf%e9%87%8c%e4%ba%91">阿里云</a></li><li><a href="http://www.imnotdoubi.test/tag/iphone%e6%96%b0%e5%93%81%e9%a2%84%e7%ba%a6">iphone新品</a></li><li><a href="http://www.imnotdoubi.test/tag/iphone%e6%96%b0%e6%ac%be%e9%a2%84%e7%ba%a6">iphone新</a></li><li><a href="http://www.imnotdoubi.test/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e8%8d%89%e8%8e%93%e6%b4%be%e5%8d%8a%e4%bb%b7%e4%bc%98%e6%83%a0">麦当劳草莓派</a></li><li><a href="http://www.imnotdoubi.test/tag/%e9%ba%a6%e5%bd%93%e5%8a%b3%e8%8d%89%e8%8e%93%e6%b4%be%e7%ac%ac2%e4%bb%bd%e5%8d%8a%e4%bb%b7">麦当劳草莓</a></li><li><a href="http://www.imnotdoubi.test/tag/%e8%b5%9a%e9%92%b1">赚钱</a></li><li><a href="http://www.imnotdoubi.test/tag/%e5%85%bb%e6%ae%96">养殖</a></li><li><a href="http://www.imnotdoubi.test/tag/%e9%98%bf%e9%87%8c%e4%ba%91ftp%e8%bf%9e%e6%8e%a5%e5%a4%b1%e8%b4%a5">阿里云ftp连</a></li>          
            
 </ul>
</div>
<style>
.title1{
                float: right;
                position: relative;
                bottom:30px;
                font-size:18px;
                cursor:pointer;
            }
.list123{
                display: none; 
                
            }
.title2{float: right;position: relative;bottom:30px;font-size:18px;cursor:pointer;}
.list1233{  display: none; width:303px;  margin:0 auto; overflow:auto; zoom:1; padding:8px;}
.list1233 li{ width:70px; height:24px; line-height:24px; float:left; margin-right:5px;  margin-top:5px; overflow:hidden;}
</style>

<script>
    $('.title1').hover(function(){
                        $(".list123").show();
                        $(".list1233").show();
                        $(this).css("color","red");
                    });
 $('.list123').hover(function(){
                        $(".list123").show();
                        $(".list1233").show();
                        $(".title1").css("color","red");
                    },function(){
                        $(".title1").css("color","#000000");
                        $(".list123").hide();
                        $(".list1233").hide();
            });
  $('.list1233').hover(function(){
                        $(".list123").show();
                        $(".list1233").show();
                        $(".title1").css("color","red");
                    },function(){
                        $(".title1").css("color","#000000");
                        $(".list123").hide();
                        $(".list1233").hide();
            });
 $('.hot-info').hover(function(){
                    },function(){
                        $(".title1").css("color","#000000");
                        $(".list123").hide();
                        $(".list1233").hide();
            });
            </script>
