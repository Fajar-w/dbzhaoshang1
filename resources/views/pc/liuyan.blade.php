<style>
.liuyan_k{margin:10px;border: 1px solid #d8d8d8;margin-top: 20px;}
.liuyan_k h2{ margin:0 20px; border-bottom:1px dashed #e2e2e2; height:58px; line-height:58px; color:#333; font-family:"微软雅黑"; font-size:18px;}
.liuyan_k h2 strong{color:#f08e0e ;}
.liuyan_k h2 em{ font-style:normal; font-size:12px; color:#999; font-weight:100; font-family:"宋体"; padding-left:1em;}
.liuyan_k1{ padding:20px 0 40px 10px; position:relative;}
.liuyan_k ul li{ height:38px;list-style-type: none;}
.liuyan_k ul li strong{ width:88px; float:left; text-align:right; padding-right:16px; line-height:28px; font-weight:100; color:#333;}
.liuyan_k ul li strong code{ color:#f27c1a; padding-right:8px;}
.ly_text1{ border:1px solid #ccc; padding:5px;   height:30px;  float:left;margin-right:12px;}
.ly_text2{ border:1px solid #ccc; padding:5px;  width:250px; height:30px;  float:left;margin-right:12px;}
.ly_textarea{ border:1px solid #ccc; padding:5px;  width:250px; height:74px;  float:left;margin-right:12px; font-size:12px;}
.ly_radio{ width:14px; height:14px; overflow:hidden; float:left; margin:6px 8px 0 0;}
.liuyan_k ul li em{ font-style:normal; float:left; padding-right:20px; color:#333; line-height:28px;}
.ly_submit{background:#f08e0e;border:1px solid #d81514;width:128px;height:40px;display:block;text-align:center;float:left;color:#fff;line-height:35px;font-size:14px;font-weight:bold;border:none;cursor:pointer;}
        </style>
        <div class="liuyan_k" id="liuyan">
            <div class="h2" style="margin:10px 20px 20px 20px;">
                <span><strong style="color:#333;font-size:20px;font-family: '微软雅黑';">如果您对该项目感兴趣,</strong><strong style="color:rgb(240,142,14);font-size:20px;font-family: '微软雅黑';">请留言咨询</strong>&nbsp;</span>
            </div>
            <div class="liuyan_k1">
                <form class="registerform" method="post" action="https://message.5988.com/index.php/my_ci/into/" id="dform" target="_blank">
                    <input type="hidden" name="realm" value="www.imnotdoubi.test"><input type="hidden" name="job" value="guestbook"><input type="hidden" name="title" value="{{$postarr->post_title}}"><input type="hidden" name="cla" value="{{$ptermsfl->name}}"><input type="hidden" name="combrand" value="{{$postarr->post_title}}"><input type="hidden" name="resolution" id="resolution">
                    <ul>
                        <li><strong><code>*</code>姓名：</strong><input type="text" class="ly_text1" name="username"><input type="radio" value="male" name="Sex" class="ly_radio"><em>先生</em><input type="radio" name="Sex" value="female" class="ly_radio"><em>女士</em></li>
                        <li><strong><code>*</code>手机：</strong><input type="text" class="ly_text1" name="iphone"></li>
                        <li><strong>地址：</strong><input type="text" class="ly_text2" name="adr"></li>
                        <li style="height:99px;"><strong><code>*</code>留言：</strong><textarea id="content" name="content" class="ly_textarea"></textarea></li>
                        <li><code style="padding:0 8px 0 38px;color:#f27c1a">*</code><span style="color:#f27c1a">如果由中国好商机为您推荐的五星好项目，是否考虑了解下？</span><span style="padding-left:20px;"><input type="radio" name="xmtj" value="是" style="width:14px;height:14px;vertical-align:bottom;"> 是</span><span style="padding-left:20px;"><input type="radio" name="xmtj" value="否" style="width:14px;height:14px;vertical-align:bottom;"> 否</span></li>
                        <li style="height:37px; padding-left:104px;"><input type="submit" value="提交留言" class="ly_submit"></li>
                    </ul>
                </form>
            </div>
        </div>