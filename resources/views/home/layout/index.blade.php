<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>{{ Config::get('app.title')}}</title>

		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/h/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/h/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<a href="/h/#" target="_top" class="h">亲，请登录</a>
							<a href="/h/#" target="_top">免费注册</a>
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="{{ url('/') }}" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="{{ url('/user') }}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="/h/#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logo"><img src="/h/images/logo.png" /></div>
					<div class="logoBig">
						<li><img src="/h/images/logobig.png" /></li>
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="/h/#"></a>
						<form>
							<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
						</form>
					</div>
				</div>

				<div class="clear"></div>
			</div>

@section('content')			
			
                 
 @show 
                    <div id="f2">
					
   
   
   
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="/h/# ">翻面儿集团</a>
								<b>|</b>
								<a href="{{ url('home/index') }}">商城首页</a>
								<b>|</b>
								<a href="/h/# ">支付宝</a>
								<b>|</b>
								<a href="/h/# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="/h/# ">关于翻面</a>
								<a href="">合作伙伴</a>
								<a href="/h/# ">联系我们</a>
								<a href="/h/# ">网站地图</a>
								<em>© 2015-2025 fanmian.com 版权所有</em>
							</p>
						</div>
					</div>

		</div>
		</div>
		<!--引导 -->
		


		<!--菜单 -->
		
		<script>
			window.jQuery || document.write('<script src="/h/basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="/h/basic/js/quick_links.js "></script>
	</body>

</html>
        