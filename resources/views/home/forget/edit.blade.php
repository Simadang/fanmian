<!DOCTYPE html>
<html>
  
  <head lang="en">
    <meta charset="UTF-8">
    <title>重置密码</title>
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
                <a href="javascript:;">重置密码</a></li>
            </ul>
            <div class="am-tabs-bd">
                              
                <form method="post" action="{{url('home/forget/update')}}">
                  {{ csrf_field() }}
                  <div class="user-pass">
                    <label for="username">
                      <i class="am-icon-user"></i>
                    </label>
                    <input type="text" name="username" id="username" value="{{old('username')}}" readonly="" ></div>
                    

                    <div class="user-pass">
                <label for="password">
                  <i class="am-icon-lock"></i>
                </label>
                <input type="password" name="password" id="password" placeholder="请输入密码"></div>

                <div class="user-pass">
                    <label for="passwordRepeat">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码"></div>
                    <span id='yanzheng' style="color:red;font-size:12px;display:none">两次输入密码不一致</span>

                    <div class="am-cf">
        

                    <input type="submit" id="update" disabled name="" value="修改" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>
                
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

    $('#passwordRepeat').keyup(function(){

      if($('#passwordRepeat').val() != $('#password').val()){

        $('#yanzheng').show();
        $("#update").attr('disabled',true);
      }else{

        $('#yanzheng').hide();
        $('#update').removeAttr('disabled');
      }
    });
  </script>
</html>