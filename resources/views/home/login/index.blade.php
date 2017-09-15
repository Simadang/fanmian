<!DOCTYPE html>
<html>
  
  <head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" />
    <link href="/h/css/dlstyle.css" rel="stylesheet" type="text/css"></head>
    <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
  
  <body>
    <div class="login-boxtitle">
      <a href="home.html">
        <img alt="" src="" /></a>
    </div>
    <div class="login-banner">
      <div class="login-main">
        <div class="login-banner-bg">
          <span></span>
          <img src="/h/images/login_big.png" /></div>
        <div class="login-box">
          <h3 class="title">登录翻面</h3>
          <div class="clear"></div>
          <div class="login-form">
            @if (count($errors) > 0)
                <div style="color:cyan; border:1px gray dashed; cursor:pointer" onclick="$(this).hide()">
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
            <form action="{{url('home/login/dologin')}}" method="post">
              {{csrf_field()}}

              <div class="user-name">
                <label for="user">
                  <i class="am-icon-user"></i>
                </label>
                <input type="text" name="username" id="user" placeholder="邮箱/手机"></div>
              <div class="user-pass">
                <label for="password">
                  <i class="am-icon-lock"></i>
                </label>
                <input type="password" name="password" id="password" placeholder="请输入密码"></div>
                <div class="am-cf">
              <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm"></div>
            </form>
          </div>
          <div class="login-links">
            
            <a href="{{url('home/forget')}}" class="am-fr">忘记密码?</a>
            <a href="{{url('home/regist/create')}}" class="zcnext am-fr am-btn-default">快速注册</a>
            <br /></div>
          
        </div>
      </div>
    </div>
    <div class="footer ">
      <div class="footer-hd ">
        <p>
          <a href="# ">恒望科技</a>
          <b>|</b>
          <a href="# ">商城首页</a>
          <b>|</b>
          <a href="# ">支付宝</a>
          <b>|</b>
          <a href="# ">物流</a></p>
      </div>
      <div class="footer-bd ">
        <p>
          <a href="# ">关于恒望</a>
          <a href="# ">合作伙伴</a>
          <a href="# ">联系我们</a>
          <a href="# ">网站地图</a>
          <em>© 2015-2025 Hengwang.com 版权所有</em></p>
      </div>
    </div>
  </body>

</html>