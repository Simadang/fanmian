<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>{{ Config::get('app.title') }}</title>

		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/h/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<script src="/h/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="/h/bootstrap-3.3.7-dist/js/jquery.min.js"></script>

		<link href="/h/css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/h/js/script.js"></script>
		<!--城市三级联动-->
		<script type="javascript" src="/h/js/pcasunzip.js" charset="gb2312"></script>
			<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<!-- <link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" /> -->
		<link href="/h/css/cartstyle.css" rel="stylesheet" type="text/css" />


		<link href="/h/css/jsstyle.css" rel="stylesheet" type="text/css" />
		

	</head>

	<header>
			<article>
				<div class="mt-logo">
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
								<div class="menu-hd MyShangcheng"><a href="{{ url('user') }}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>

							</div>
							<!-- <div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
							</div> -->
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</div></ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="/h/images/logo-search.png"></li>
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
					</div>
				
			</article>
		</header>

		<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="{{ url('/') }}">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						</div>
			</div>

			@section('content')
	
	
	            
	@show
		        				
