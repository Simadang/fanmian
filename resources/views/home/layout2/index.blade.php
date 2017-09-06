<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>{{ Config::get('app.title') }}</title>

		<link href="/qiantai/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/qiantai/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		
		<link href="/qiantai/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/qiantai/css/infstyle.css" rel="stylesheet" type="text/css">
		<link href="/qiantai/css/addstyle.css" rel="stylesheet" type="text/css">
		<link href="/qiantai/css/stepstyle.css" rel="stylesheet" type="text/css">
		<link href="/qiantai/css/orstyle.css" rel="stylesheet" type="text/css">
		
		<script src="/qiantai/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/qiantai/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
		
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
								<div class="menu-hd">
									<a href="/qiantai/#" target="_top" class="h">亲，请登录</a>
									<a href="/qiantai/#" target="_top">免费注册</a>
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
						
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="/qiantai/#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="/qiantai/images/logobig.png" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="/qiantai/#"></a>
								<form>
									<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>

						<div class="clear"></div>
					</div>	
				</div>
			</article>
		</header>


		<div class="center">
		<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
			<div class="col-main">
				
@section('content')




@show
				
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="/qiantai/#">恒望科技</a>
							<b>|</b>
							<a href="/qiantai/#">商城首页</a>
							<b>|</b>
							<a href="/qiantai/#">支付宝</a>
							<b>|</b>
							<a href="/qiantai/#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="/qiantai/#">关于恒望</a>
							<a href="/qiantai/#">合作伙伴</a>
							<a href="/qiantai/#">联系我们</a>
							<a href="/qiantai/#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="">个人中心</a>
					</li>
					<li class="person">
						<a href="{{ url('user/detail') }}">个人资料</a>
						<ul>
							<li> <a href="{{ url('user/detail') }}">个人信息</a></li>
							<li> <a href="{{ url('user/idcard') }}">安全设置</a></li>
							<li> <a href="{{ url('user/address') }}">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="/qiantai/#">我的交易</a>
						<ul>
							<li><a href="{{ url('user/order') }}">订单管理</a></li>
							<li> <a href="/qiantai/change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="/qiantai/#">我的资产</a>
						<ul>
							<li> <a href="/qiantai/coupon.html">优惠券 </a></li>
							<li> <a href="/qiantai/bonus.html">红包</a></li>
							<li> <a href="/qiantai/bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="/qiantai/#">我的小窝</a>
						<ul>
							<li> <a href="/qiantai/collection.html">收藏</a></li>
							<li> <a href="/qiantai/foot.html">足迹</a></li>
							<li> <a href="/qiantai/comment.html">评价</a></li>
							<li> <a href="/qiantai/news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>