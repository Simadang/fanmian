<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>付款成功页面</title>
<link rel="stylesheet"  type="text/css" href="/h/AmazeUI-2.4.2/assets/css/amazeui.css"/>
<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />

<link href="/h/css/sustyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>

</head>

<body>


<!--顶部导航条 -->
<div class="am-container header">
        <ul class="message-l">
          <div class="topMessage">
            <div class="menu-hd">
              @if(session('user'))
              <a href="javascript:;" target="_top" class="h">欢迎您,{{ session('user')['username'] }}</a>
              <a href="{{ url('home/login/logout') }}" target="_top">[退出]</a>
              @else
              <a href="{{ url('home/login') }}" target="_top" class="h">亲，请登录</a>
              <a href="{{ url('home/regist') }}" target="_top">免费注册</a>
              @endif
          </div>
          </div>
        </ul>
        <ul class="message-r">
          <div class="topMessage home">
            <div class="menu-hd"><a href="{{ url('/') }}" target="_top" class="h">商城首页</a></div>
          </div>
          <div class="topMessage my-shangcheng">
            <div class="menu-hd MyShangcheng"><a href="{{ url('/user/center') }}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
          </div>
          <div class="topMessage mini-cart">
            
          </div>
          
        </ul>
      </div>

<!--悬浮搜索框-->

 <div class="nav white">

                    <div class="logo"><img src="/h/images/logo-search.png" /></div>
                    <div class="logoBig">
                        <li><img src="/h/images/logo-search.png" /></li>

                    </div>

                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="/h/#"></a>
                        <form method='get' action='/search'>
                        
                            <input id="searchInput" name="search" type="text" placeholder="搜索商品" autocomplete="off" value="{{$request['search'] or ''}}">
                            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                        </form>
                    </div>
                </div>

<div class="clear"></div>



<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>¥{{$request['cost']}}</em></li>
       <div class="user-info">
        
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>

        <a href="/hme/order" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>


<div class="footer" >
 <div class="footer-hd">
 <p>
 <a href="#">恒望科技</a>
 <b>|</b>
 <a href="#">商城首页</a>
 <b>|</b>
 <a href="#">支付宝</a>
 <b>|</b>
 <a href="#">物流</a>
 </p>
 </div>
 <div class="footer-bd">
 <p>
 <a href="#">关于恒望</a>
 <a href="#">合作伙伴</a>
 <a href="#">联系我们</a>
 <a href="#">网站地图</a>
 <em>© 2015-2025 Hengwang.com 版权所有</em>
 </p>
 </div>
</div>


</body>
</html>
