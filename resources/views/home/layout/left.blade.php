@extends('home.layout.header')

@section('content')
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>模板</title>

		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/stepstyle.css" rel="stylesheet" type="text/css">

		<link href="/h/css/infstyle.css" rel="stylesheet" type="text/css">
		<link href="/h/css/systyle.css" rel="stylesheet" type="text/css">
		<link href="/h/css/orstyle.css" rel="stylesheet" type="text/css">


		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>

	</head>

	<body>
		

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">



				@section('left')
	
	
	            
				@show




				</div>
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="/h/#">恒望科技</a>
							<b>|</b>
							<a href="/h/#">商城首页</a>
							<b>|</b>
							<a href="/h/#">支付宝</a>
							<b>|</b>
							<a href="/h/#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="/h/#">关于恒望</a>
							<a href="/h/#">合作伙伴</a>
							<a href="/h/#">联系我们</a>
							<a href="/h/#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>
			</div>

			<aside class="menu">
				<ul>
					<li class="person">

						<a href="{{ url('user/center') }}">个人中心</a>
					</li>
					<li class="person">
						<a href="javascript:;">个人资料</a>
						<ul>
							<li> <a href="{{ url('user/detail') }}">个人信息</a></li>

							<li> <a href="{{ url('/safety/index') }}">安全设置</a></li>
							<li> <a href="{{ url('/address') }}">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="/h/#">我的交易</a>
						<ul>
							<li><a href="{{ url('order/index') }}">订单管理</a></li>
							<li> <a href="/h/change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="/h/#">我的资产</a>
						<ul>
							<li> <a href="/h/coupon.html">优惠券 </a></li>
							<li> <a href="/h/bonus.html">红包</a></li>
							<li> <a href="/h/bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="/h/#">我的小窝</a>
						<ul>
							<li> <a href="/h/collection.html">收藏</a></li>
							<li> <a href="/h/foot.html">足迹</a></li>
							<li> <a href="/h/comment.html">评价</a></li>
							<li> <a href="/h/news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>
@endsection