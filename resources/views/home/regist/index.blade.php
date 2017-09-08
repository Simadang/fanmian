<!DOCTYPE html>
<html>
  
  <head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
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
              <li class="am-active">
                <a href="javascript:;" onclick="">邮箱注册</a></li>
              <li>
                <a href="javascript:;">手机号注册</a></li>
            </ul>
            <div class="am-tabs-bd">
              <div class="am-tab-panel am-active">
              
                <form method="post" action="/home/regist">
                	{{ csrf_field() }}
                  <div class="user-email">
                    <label for="email">
                      <i class="am-icon-envelope-o"></i>
                    </label>
                    <input type="email" name="email" id="email" placeholder="请输入邮箱账号"></div>
                    <span id='yanzheng1' style="color:red;font-size:12px;display:none">邮箱已被注册</span>

                  <div class="user-pass">
                    <label for="username">
                      <i class="am-icon-user"></i>
                    </label>
                    <input type="text" name="username" id="username" placeholder="用户名"></div>
                    <span id='yanzheng2' style="color:red;font-size:12px;display:none">用户名已存在</span>

                  <div class="user-pass">
                    <label for="password">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="password" id="password" placeholder="设置密码"></div>
                  <div class="user-pass">
                    <label for="passwordRepeat">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码">
                    <span id='yanzheng5' style="color:red;font-size:12px;display:none;">两次输入密码不一致</span></div>
                    

                     <div class="am-cf">
                  <input type="submit" id="sub1" disabled name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>
               <a href="{{url('home/login')}}">已有账号?去登录</a>
              </div>
              <div class="am-tab-panel">
                
                <form method="post" action="{{url('home/regist/insert')}}">
                	{{ csrf_field() }}
                  <div class="user-phone">
                    <label for="phone">
                      <i class="am-icon-mobile-phone am-icon-md"></i>
                    </label>
                    <input type="tel" name="phone" id="phone" placeholder="请输入手机号"></div>

                    <span id='yanzheng3' style="color:red;font-size:12px;display:none">手机号已存在</span>

                  <div class="verification">
                    <label for="code">
                      <i class="am-icon-code-fork"></i>
                    </label>
                    <input type="tel" name="phonecode" id="code" placeholder="请输入验证码">
                    <a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
                      <span id="dyMobileButton">获取</span></a>
                  </div>
          <script type="text/javascript">
      		function sendMobileCode(){

            var preg_phone = /^1[3|4|5|7|8|9]\d{9}$/;

            var r = preg_phone.test($('#phone').val());

            if(preg_phone.test($('#phone').val())){


              $.post('{{url('home/regist/yanzheng3')}}',{'phone':$('#phone').val(),'_token':'{{csrf_token()}}'},function(msg){

                  if(msg == 1){

                    $('#yanzheng3').show();
                  }else if(msg == 0){

                    $('#yanzheng3').hide();
                    $.get('/phoneCode',{'phone':$('#phone').val()},function(msg){
                      if(msg == 2){
                        alert('验证码已发送');
                      }
                    });
                  }

                  
              })
              
            }else{

              alert('请输入正确的手机号');

            }
            
          }
          </script>

                  <div class="user-pass">
                    <label for="username">
                      <i class="am-icon-user"></i>
                    </label>
                    <input type="text" name="username" id="username1" placeholder="用户名"></div>
                    <span id='yanzheng4' style="color:red;font-size:12px;display:none">用户名已存在</span>

                  <div class="user-pass">
                    <label for="password">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="password" id="password1" placeholder="设置密码"></div>
                  <div class="user-pass">
                    <label for="passwordRepeat">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="repassword" id="passwordRepeat1" placeholder="确认密码"></div>
                    <div class="am-cf">
                    
                    <span id='yanzheng6' style="color:red;font-size:12px;display:none">两次输入密码不一致</span>

                  	<input type="submit" id="sub2" disabled name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>
                <a href="{{url('home/login')}}">已有账号?去登录</a>
                <hr></div>

              <script>$(function() {
                  $('#doc-my-tabs').tabs();
                })</script>
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

    $('#passwordRepeat').keyup(function(){

      var password = $('#password').val();
      var passwordRepeat = $('#passwordRepeat').val();

      if(password != passwordRepeat){

        $('#yanzheng5').show();
        $("#sub1").attr('disabled',true);
      }else if(password == passwordRepeat){

        $('#yanzheng5').hide();
        $("#sub1").removeAttr('disabled');
      }
    });

    $('#passwordRepeat1').keyup(function(){

      var password1 = $('#password1').val();
      var passwordRepeat1 = $('#passwordRepeat1').val();

      if(password1 != passwordRepeat1){

        $('#yanzheng6').show();
        $("#sub2").attr('disabled',true);
      }else if(password1 == passwordRepeat1){

        $('#yanzheng6').hide();
        $("#sub2").removeAttr('disabled');
      }
    });

    $('#email').blur(function(){

      var email = $('#email').val();

      $.post('{{url('home/regist/yanzheng1')}}',{'email':email,'_token':'{{csrf_token()}}'},function(data){

          if(data == 1){

            $('#yanzheng1').show();
          }else{

            $('#yanzheng1').hide();
          }
      });
      
    });

    $('#username').blur(function(){

      var username = $('#username').val();

      $.post('{{url('home/regist/yanzheng2')}}',{'username':username,'_token':'{{csrf_token()}}'},function(data){

          if(data == 1){

            $('#yanzheng2').show();
          }else{

            $('#yanzheng2').hide();
          }
      })
    });

    $('#username1').blur(function(){

      var username = $('#username1').val();

      $.post('{{url('home/regist/yanzheng2')}}',{'username':username,'_token':'{{csrf_token()}}'},function(data){

          if(data == 1){

            $('#yanzheng4').show();
          }else{

            $('#yanzheng4').hide();
          }
      })
    });
    
  </script>
</html>