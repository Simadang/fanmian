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
		<script type="text/javascript" src="{{asset('d/layer/layer.js')}}"></script>

	</head>

	<body>
		<div class="hmtop">
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
			</div>


			
<div class="banner">
              <!--轮播 -->
              <center>
				<div class="am-slider am-slider-default scoll" data-am-flexslider id="banner_tabs" style="width:870px;">
					<ul class="am-slides">

						
						@foreach($data1 as $key=>$value)
					

						<li class="banner2"><a><img src="{{ $value['url'] }}" /></a></li>

						
						@endforeach
					</ul>
				</div>
				</center>
				<div class="clear"></div>	
			</div>
				

			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="{{ url('/') }}">首页</a></li>
                                <li class="qc"><a href="/search/5">二手手机</a></li>
                                <li class="qc"><a href="/search/5">二手火箭</a></li>
                                <li class="qc"><a href="/home/goods/create">发布闲置</a></li>
                                <li class="qc last"><a href="/pay/sell">我的闲置</a></li>
							</ul>

	
						</div>					
		        				
						<!--无线分类导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">

											@foreach($data as $k=>$v)
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><a class="ml-22" href="/search/{{ $v['id'] }}">{{ $v['name'] }}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	@foreach($v['sub'] as $kk=>$vv)
																	<dl class="dl-sort">

																		<dt><span title="">{{ $vv['name'] }}</span></dt>
																		@foreach($vv['sub'] as $kkk=>$vvv)
																		<dd><a title="" href="/search/{{ $vvv['id'] }}"><span>{{ $vvv['name'] }}</span></a></dd>
																		@endforeach
																	</dl>
																	
																	@endforeach
																</div>
																
															</div>
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
										@endforeach
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href=""><img src="/h/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="/h/#"><img src="/h/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="/h/#"><img src="/h/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="/h/#"><img src="/h/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>
	
					<!--走马灯 -->
					<div class="marqueen" style="margin-right:-80px;">
						
						<div class="demo">

							<ul>
								<div class="">
									<a href="/home/goods/create">
										<img src="h/images/fabuxianzhi.jpg">
									</a>
								</div>
								<div class="mod-vip">
								@if(session('user'))
									<div class="m-baseinfo">
										<a href="person/index.html">
											<img src="h/images/logo-search.png">
										</a>
										<em>
											Hi,<span class="s-name">{{ session('user')['username'] }}</span>							
										</em>
									</div>
									@else
									<div class="member-logout">
										<a class="am-btn-warning btn" href="{{ url('home/login') }}">登录</a>
										<a class="am-btn-warning btn" href="{{ url('home/regist') }}">注册</a>
									</div>
									@endif
									<div class="clear"></div>	
								</div>																	    
								<span class="marqueen-title"><a target="_blank" href="/notice">公告</a></span>

								@foreach($notice as $k=>$v)
								
								<li><a target="_blank" href="/notice/{{$v['id']}}">{{ $v['title'] }}</a></li>
								
								@endforeach
								
								
							</ul>
                        <div class="advTip"><img src="images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--广告位 -->
			<div class="am-g am-g-fixed recommendation">
					@foreach($ad as $k=>$v)	
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>{{$v['name']}}</h3>
								<h4>{{$v['content']}}</h4>
							</div>
							<div class="recommendationMain one">
								<a href="http://{{$v['url']}}" target="_blank"><img src="{{$v['pic']}}"></a>
							</div>
						</div>	
					@endforeach

					</div>
					


					<div class="clear "></div>
					<!--热门活动 -->

					
				

@foreach($data2 as $k1=>$v1)

            <div id="f1">
			<!--甜点-->
			
			<div class="am-container ">
				<div class="shopTitle ">
					<h4>{{ $v1['name']}}</h4>
					<h3>翻面,给你更好的一面</h3>
					
					<span class="more ">
            <a href="/search/{{ $v1['id'] }}">更多二手<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                </span>
				</div>
			</div>
			
			<div class="am-g am-g-fixed floodFour">
				<div class="am-u-sm-5 am-u-md-4 text-one list ">
					<div class="word">
							


							@foreach($data3 as $k3=>$v3)
							
							
							@if($v3['pid'] == $v1['id'])
							
							<a class="outer" href="/search/{{ $v3['id'] }}"><span class="inner"><b class="text">{{ $v3['name']}}</b></span></a>
							

							
							@endif
							@endforeach	
						
					</div>
					<a href="/h/# ">
						<div class="outer-con ">
							<div class="title ">
							开抢啦！
							</div>
							<div class="sub-title ">
								美女大礼包
							</div>									
						</div>
                          <img src="/h/images/2016.png " />								
					</a>
					<div class="triangle-topright"></div>						
				</div>




			@foreach($g as $gk=>$gv)

			
	
				@if($gk == $v1['id'])
				
				
				@if(count($gv)>5)
					<?php
                       $gv = array_slice($gv,0,5);
					?>
				@endif
					

				
				@foreach($gv as $gvk=>$gvv)
				
				
				

				<?php

				switch ($gvk)
				{
					case 0:
						echo "<div class='am-u-sm-7 am-u-md-4 text-two sug'>";
					break;
					
					case 1:
						echo "<div class='am-u-sm-7 am-u-md-4 text-two'>";
					break;

					case 2:
						echo "<div class='am-u-sm-3 am-u-md-2 text-three big'>";
					break;

					case 3:
						echo "<div class='am-u-sm-3 am-u-md-2 text-three sug'>";
					break;

					case 4:
						echo "<div class='am-u-sm-3 am-u-md-2 text-three'>";
					break;

				}

				?>
				

						<div class="outer-con ">
							<div class="title ">
								{{ $gvv['title']}}
							</div>									
							<div class="sub-title ">
								<b>价格:￥</b><strong>{{ $gvv['reprice']}}</strong>
							</div>
							
						</div>
						<a href="/home/goods/{{ $gvv['id']}}"><img src="/{{ $gvv['pic'] }}" /></a>
					</div>

					


				@endforeach
				@endif
				@endforeach

				<div class="am-u-sm-3 am-u-md-2 text-three last big ">
					
						
						<a href="{{url('home/fishpond?tid='.$v1['id'].'&name='.$v1['name'])}}"><span class="marqueen-title">面盆儿</span></a>
						<div style="overflow:hidden;">
						
						@foreach($type as $tk=>$tv)
						@if($tv['name']==$v1['name'])
							<p style="text-align:left;">提问者:aaa</p>
							<p style="text-align:left;">提问时间:{{ $tv['ctime']}}</p>

							<p style="text-align:left;">问题:<a href="javascript:void(0)" onclick="showQuestion({{ $tv['uid'] }})">{{ $tv['content']}}</a></p>
						@endif					
						@endforeach
						
					 	</div>
					
				</div>

			</div>
         <div class="clear "></div>  
       </div>
                 
@endforeach


	<script>

	// 显示问题列表的ajax
         function showQuestion(cateid){
            $.get('{{url('/home/answer/')}}/'+cateid,{},function(data){
                //页面层
                layer.open({
                    type: 1,
                    title:"回复列表",
                    skin: 'layui-layer-rim', //加上边框
                    area: ['620px', '340px'], //宽高
                    content: data
                });

            console.log(data)
            });
        }
					
</script>


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
					友情链接:
					@foreach($link as $k=>$v)
						@if($v['status']==0)
						<a href="http://{{$v['url']}}">{{$v['title']}}</a>
						<b>|</b>
						@endif
					@endforeach	
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
        