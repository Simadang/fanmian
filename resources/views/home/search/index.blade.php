<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>搜索页面</title>

		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/h/css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/h/js/script.js"></script>
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
                    <div class="topMessage favorite">
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
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
                                <li class="index"><a href="{{ url('/') }}">首页</a></li>
                                <li class="qc"><a href="/search/5">二手手机</a></li>
                                <li class="qc"><a href="/search/5">二手火箭</a></li>
                                <li class="qc"><a href="/home/goods/create">发布闲置</a></li>
                                <li class="qc last"><a href="/h/#">我的闲置</a></li>
                            </ul>
						    
						</div>
			</div>
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														

							<ul class="select">
								
								<div class="clear"></div>
								<li class="select-result">
									<dl>
										<dt>已选</dt>
										<dd class="select-no"></dd>
										<p class="eliminateCriteria">清除</p>
									</dl>
								</li>
								<div class="clear"></div>


								<li class="select-list">
									<dl id="select1">
										<dt class="am-badge am-round">品牌</dt>	
									
										 <div class="dd-conent">
										 									
											<dd class="select-all selected"><a href="/search">全部</a></dd>
											@foreach($data2 as $k1=>$v1)	
											<dd><a href="/search/{{ $v1['id'] }}">{{ $v1['name']}}</a></dd>
										 	@endforeach
										 </div>
						
									</dl>
								</li>


								<li class="select-list">
									<dl id="select2">
										<dt class="am-badge am-round">种类</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="/search">全部</a></dd>
											@foreach($data3 as $k3=>$v3)	
											<dd><a href="/search/{{ $v3['id'] }}">{{ $v3['name']}}</a></dd>
											@endforeach
										</div>
									</dl>
								</li>
								<li class="select-list">
									<dl id="select3">
										<dt class="am-badge am-round">选购热点</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="/search">全部</a></dd>
											@foreach($data4 as $k4=>$v4)	
											<dd><a href="/search/{{ $v4['id'] }}">{{ $v4['name']}}</a></dd>
											@endforeach
										</div>
									</dl>
								</li>
					        
							</ul>
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li class="first"><a title="综合">综合排序</a></li>
									<li><a title="销量">销量排序</a></li>
									<li><a title="价格">价格优先</a></li>
									<li class="big"><a title="评价" href="h/#">评价为主</a></li>
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
								@foreach($goods as $gk=>$gv)
									@foreach($gv as $gkk=>$gvv)

									<li>
										<div class="i-pic limit">
											
											<a href="/home/goods/{{ $gvv['id']}}">
												<img id= "picid" src="/{{ $gvv['pic']}}" />
											</a>		
												
											<p class="title fl">{{ $gvv['title']}}</p>
											<p class="price fl">
												<a href="/home/goods/{{ $gvv['id']}}">
												<b>¥</b>
												<strong>{{ $gvv['reprice']}}</strong>
												</a>
											</p>
											<p class="number fl">
												销量<span>1110</span>
											</p>
										</div>
									</li>
									@endforeach
								@endforeach
								</ul>
							</div>
							<div class="search-side">

								<div class="side-title">
									经典搭配
								</div>

								<li>
									<div class="i-pic check">
										<img src="/h/images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/h/images/cp2.jpg" />
										<p class="check-title">ZEK 原味海苔</p>
										<p class="price fl">
											<b>¥</b>
											<strong>8.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/h/images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>

							</div>
							<div class="clear"></div>
							<!--分页 -->
							<ul class="am-pagination am-pagination-right">
								<li class="am-disabled"><a href="h/#">&laquo;</a></li>
								<li class="am-active"><a href="h/#">1</a></li>
								<li><a href="h/#">2</a></li>
								<li><a href="h/#">3</a></li>
								<li><a href="h/#">4</a></li>
								<li><a href="h/#">5</a></li>
								<li><a href="h/#">&raquo;</a></li>
							</ul>

						</div>
					</div>
					<div class="footer">
						<div class="footer-hd">
							<p>
								<a href="h/#">恒望科技</a>
								<b>|</b>
								<a href="h/#">商城首页</a>
								<b>|</b>
								<a href="h/#">支付宝</a>
								<b>|</b>
								<a href="h/#">物流</a>
							</p>
						</div>
						<div class="footer-bd">
							<p>
								<a href="h/#">关于恒望</a>
								<a href="h/#">合作伙伴</a>
								<a href="h/#">联系我们</a>
								<a href="h/#">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
				</div>

			</div>

		<!--引导 -->
		<div class="navCir">
			<li><a href="h/home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="h/sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="h/shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="h/person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>


		<script>
			window.jQuery || document.write('<script src="/h/basic/js/jquery-1.9.min.js"><\/script>');
		</script>
		<script type="text/javascript" src="/h/basic/js/quick_links.js"></script>

<div class="theme-popover-mask"></div>

	</body>

</html>
