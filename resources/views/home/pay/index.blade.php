<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/h/css/jsstyle.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="/h/js/address.js"></script>
		<!--城市三级联动-->
		<script type="javascript" src="/h/js/pcasunzip.js" charset="gb2312"></script>
		
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
					<div class="menu-hd MyShangcheng"><a href="{{ url('user') }}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<!-- <div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="/h/#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
				</div> -->
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="/h/#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
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
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul>
							<div class="per-border"></div>


							@foreach($user as $k=>$v)

							@if($v['status']==0)
							<li class="user-addresslist defaultAddr">
							@else
							<li class="user-addresslist">
							@endif


								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                 					  <span class="buy-user">{{ $v['name'] }}</span>
										<span class="buy-phone">{{ $v['phone'] }}</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								  				
												 {{ $v['address'] }}
										</span>

										</span>
									</div>

									@if($v['status']==0)
										<ins class="deftip">默认地址</ins>
									@endif

								</div>
								<div class="address-right">
									<a href="/h/person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									<a href="{{ url('pay/status') }}" class="hidden"></a>
									<span class="new-addr-bar hidden">|</span>
									<a href="{{ url('pay/edit/'.$v['id']) }}">编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="{{ url('pay/del/'.$v['id']) }}">删除</a>
								</div>

							</li>
							<div class="per-border"></div>
							@endforeach



						

						</ul>

						<div class="clear"></div>
					</div>
				


					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card"><img src="/h/images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq"><img src="/h/images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay taobao"><img src="/h/images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>
							@foreach($goods as $kk=>$vv)
							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="/h/#" class="J_MakePoint">
															<img src="{{ $vv['pic'] }}" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="/h/#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $vv['title'] }}</a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<!-- 商品介绍 -->
														<span class="sku-line">{{ $vv['intro'] }}</span><br>
														<!-- 商品成色 -->
														<span class="sku-line">{{ $vv['condition'] }}</span>
														
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now" id="papapa">{{ $vv['reprice'] }}</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
								<div class="sl">
									<input class="min am-btn" name="" type="button" value="-" id="jian" />
									<input class="text_box" name="num" type="text" value="1" id="num"  style="width:30px;" />
									<input class="add am-btn" name="" type="button"id="jia" value="+" />
								</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number" id="sum"> {{ $vv['reprice'] }}</em>
												</div>
								@endforeach
												<script src="/d/jquery/jquery-1.8.3.min.js"></script>
												<script>
													
													
													$('#jia').click(function(){
															var s = $('#papapa').html();
															// alert(s);
															var n = $('#num').val();
														// alert(n);
														// alert(s);
														 		
														 		if(n>={{$goods[0]['num']}}){

														 			n = {{$goods[0]['num']}};
														 		}else{

														 			var sum = s*(++n);
														 		}


																// var sum = s*(++n);
																$('#sum').html(sum);
																$('#Fee').val(sum);
																
																// alert(sum);
													})
													$('#jian').click(function(){
															var s = $('#papapa').html();

															var n = $('#num').val();
														// alert(n);
														// alert(s);

																
																if(n<=0){

														 			n = 0;
														 		}else{

														 			var sum = s*(--n);
														 		}

														 		

																$('#sum').html(sum);
																$('#Fee').val(sum);
																

																// alert(sum);
													})



												</script>


											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														免邮
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
							</tr>
							
							<div class="clear"></div>
							</div>

						
							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							
							</div>
							<!--优惠券 -->
							<div class="buy-agio">
							

								

							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span></span>
									<em class="pay-sum" id="xiaomeng">
										
									</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
									<form action="{{ url('pay/success') }}"method="post">
									{{ csrf_field() }}
									<input type="hidden" name="num" value="{{ $vv['num'] }}" />
									<!-- <input type="hidden" name="cost" value="{{ $vv['reprice'] }}" /> -->
									<input type="hidden" name="gid" value="{{ $vv['id'] }}" />
									<input type="hidden" name="ordertime" value="{{ date('Y-m-d H:i:s',time()) }}" />
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
									
                                    <span>¥</span> <em class="pay-sum" >
                                    	<input type="text" id="Fee" name="cost" value="{{ $vv['reprice'] }}" readonly />
                                    </em>
											</span>
										</div>

									
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<!-- <a id="J_Go" href="" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a> -->
											<button id="J_Go" class="btn-go" tabindex="0" style="margin-left:870px">提交订单</button>
										</div>
									</div>
										</form>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
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
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>添加地址</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
				   @if (count($errors) > 0)
                <div class="mws-form-message warning">
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
     		 {{--<p style="color:red">用户名错误</p>--}}
					<form class="am-form am-form-horizontal" method="post" action="{{ url('pay/store') }}">
									{{ csrf_field() }}
						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" placeholder="收货人"name="name">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" type="text"name="phone">
							</div>
						</div>

						<div class="am-form-group">
							
							<div class="am-form-content address">
								
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro"name="address" placeholder="输入详细地址"></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<button class="am-btn am-btn-danger">添加</button>
								<a href="{{ url('pay/index') }}"><button class="am-btn am-btn-danger">取消添加</button></a>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="clear"></div>
	</body>

</html>