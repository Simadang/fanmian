<!DOCTYPE html>
<html>
  
  <head lang="en">
    <meta charset="UTF-8">
    <title>忘记密码</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/h/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
    <link href="/h/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
  </head>
  
  <body>
    <div class="login-boxtitle">
      <a href="/h/home/demo.html">
        <img alt="" src="/h/images/logobig.png" /></a>
    </div>
    <div class="res-banner">
      @if (count($errors) > 0)
      <div style="color:white; width:200px; cursor:pointer; background:black; position:absolute;bottom:130px;Z-index:2" onclick="$(this).hide()">
        验证失败
          <ul>
            @if(is_object($errors))
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            @else
              <li>{{ $errors }}</li>
            @endif
          </ul>
      </div>
      @endif
      <div class="res-main">
        <div class="login-banner-bg">
          <span></span>
          <img src="/h/images/big.jpg" /></div>
        <div class="login-box">
          <div class="am-tabs" id="doc-my-tabs">
            <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
              <li>
                <a href="javascript:;">忘记密码</a></li>
            </ul>
            <div class="am-tabs-bd">
                              
                <form method="post" action="{{url('home/forget/verify')}}">
                  {{ csrf_field() }}
                  <div class="user-pass">
                    <label for="username">
                      <i class="am-icon-user"></i>
                    </label>
                    <input type="text" name="username" id="username" value="{{old('username')}}" placeholder="请输入注册时手机或邮箱"></div>
                    <span id='yanzhengemail' style="color:red;font-size:12px;display:none">邮箱格式错误</span>
                    <span id='yanzhengphone' style="color:red;font-size:12px;display:none">手机号格式错误</span>

                    <div class="user-pass">
                    <label for="verify">
                      <i class="am-icon-code-fork"></i>
                    </label>
                    <input type="text" name="verify" placeholder="请输入验证码">
                    <a class="btn" href="javascript:void(0);" onClick="sendVerifyCode();" id="sendVerifyCode">
                      <span id="dyMobileButton">获取</span></a>
                  </div>

                   <!-- <div class="user-pass">
                    <label for="verify">
                      <i class="am-icon-code-fork"></i>
                    </label>
                    <input type="text" name="verify"  placeholder="验证码会发送到您填写的账号上"></div> -->
                  
          <script type="text/javascript">

            var time = null;

            function sendVerifyCode(){

              var username = $('#username').val();

              var preg_phone = /^1[3|4|5|7|8|9]\d{9}$/;
              var preg_email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;

              if(preg_phone.test(username)){

                $('#yanzhengemail').hide();

                $.get('{{url('home/forget/phoneverify')}}',{'phone':username},function(msg){
                      if(msg == 2){
                        
                        // 验证码发送成功后进行倒计时
                        var i = 60;

                        if(time == null){
                        time = setInterval(function(){

                            i--;

                            $('#dyMobileButton').html(i+'s');
                              
                            if(i == 0){

                              $('#dyMobileButton').html('获取');
                              clearInterval(time);
                              time = null;
                            }
                          },1000);
                        }
                        
                      }
                      
                });
                
              }else if(preg_email.test(username)){

                  $.get('{{url('home/forget/yanzheng')}}',{'username':username},function(data){

                    $('#yanzhengemail').hide();
                    
                  });
                  
              }else{

                  $('#yanzhengemail').show();
              }

              

            }
          </script>
            
                  

                  
                  
                    <div class="am-cf">
        

                    <input type="submit"  name="" value="下一步" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>
                <a href="{{url('home/login')}}">登录</a>
                <hr>

              
            </div>
              
          </div>

        </div>
      </div>

      </div>
      
      <div class="footer ">
        <div class="footer-hd ">
          <p>
            <a href="/h/# ">恒望科技</a>
            <b>|</b>
            <a href="/h/# ">商城首页</a>
            <b>|</b>
            <a href="/h/# ">支付宝</a>
            <b>|</b>
            <a href="/h/# ">物流</a></p>
        </div>
        <div class="footer-bd ">
          <p>
            <a href="/h/# ">关于恒望</a>
            <a href="/h/# ">合作伙伴</a>
            <a href="/h/# ">联系我们</a>
            <a href="/h/# ">网站地图</a>
            <em>© 2015-2025 Hengwang.com 版权所有</em></p>
        </div>


      </div>
  </body>
  <script type="text/javascript">
    
  </script>
</html>