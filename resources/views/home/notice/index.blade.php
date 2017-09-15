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
		<style type="text/css">
			#page_page {
			    color: #ffffff;
			    float: left;
			    padding: 2px;
			    margin: 10px 8px 10px 0;
			    background-color: rgba(0, 0, 0, 0.15);
    		}

			#page_page li {
			    float: left;
			    height: 20px;
			    padding: 0 10px;
			    display: block;
			    font-size: 12px;
			    line-height: 20px;
			    text-align: center;
			}
		</style>
		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

		<link href="/h/css/seastyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/h/js/script.js"></script>
		
		<script type="text/javascript" src="{{asset('d/layer/layer.js')}}"></script>
	</head>
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
						<div class="menu-hd MyShangcheng"><a href="/h/#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="/h/#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="/h/images/logo-search.png"></li>
							</div>

							<div class="search-bar pr">
								<ul>
									<li style="font-size:30px; color:red;">公告列表:<span style="font-size:25px; color:black"></span></li>
								</ul>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				
			</article>

	<body class="am-container header">
		
		<div style="margin-top:50px;">
			
			<ul>
			@foreach($data as $k=>$v)
				<li style="font-size:20px;color:red">
					<a target="_blank" href="/notice/{{$v['id']}}"><span style="font-size:50px; color:black">{{ $v['title']}}</span>
					<span style="font-size:15px; color:black">{{ $v['ctime']}}</span></a>
				</li>
				
			@endforeach	
			</ul>
		</div>
		<div style="margin-top:20px;margin-bottom:20px;">
			
		</div>
		

	</body>
