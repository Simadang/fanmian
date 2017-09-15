@extends('home.layout.left')
@section('left')
<div class="wrap-list">
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.html">
											<img src="/h/images/getAvatar.do.jpg">
										</a>
										<em class="s-name">(小叮当)<span class="vip1"></span></em>
										<div class="s-prestige am-btn am-round">
											会员福利</div>
									</div>
									<div class="m-right">
										<div class="m-new">
											<a href="news.html"><i class="am-icon-bell-o"></i>消息</a>
										</div>
										<div class="m-address">
											<a href="address.html" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>

								<!--个人资产-->
								<div class="m-userproperty">
									<div class="s-bar">
										<i class="s-icon"></i>个人资产
									</div>
									<p class="m-bonus">
										<a href="bonus.html">
											<i><img src="/h/images/bonus.png"></i>
											<span class="m-title">红包</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-coupon">
										<a href="coupon.html">
											<i><img src="/h/images/coupon.png"></i>
											<span class="m-title">优惠券</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-bill">
										<a href="bill.html">
											<i><img src="/h/images/wallet.png"></i>
											<span class="m-title">钱包</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-big">
										<a href="#">
											<i><img src="/h/images/day-to.png"></i>
											<span class="m-title">签到有礼</span>
										</a>
									</p>
									<p class="m-big">
										<a href="#">
											<i><img src="/h/images/72h.png"></i>
											<span class="m-title">72小时发货</span>
										</a>
									</p>
								</div>
							</div>
							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="order.html">全部订单</a>
								</div>
								<ul>
									<li><a href="order.html"><i><img src="/h/images/pay.png"></i><span>待付款</span></a></li>
									<li><a href="order.html"><i><img src="/h/images/send.png"></i><span>待发货<em class="m-num">1</em></span></a></li>
									<li><a href="order.html"><i><img src="/h/images/receive.png"></i><span>待收货</span></a></li>
									<li><a href="order.html"><i><img src="/h/images/comment.png"></i><span>待评价<em class="m-num">3</em></span></a></li>
									<li><a href="change.html"><i><img src="/h/images/refund.png"></i><span>退换货</span></a></li>
								</ul>
							</div>
							
							

							<!--收藏夹 -->
							<div class="you-like">
								<div class="s-bar">我的收藏
									<a class="am-badge am-badge-danger am-round">降价</a>
									<a class="am-badge am-badge-danger am-round">下架</a>
									<a class="i-load-more-item-shadow" href="#"><i class="am-icon-refresh am-icon-fw"></i>换一组</a>
								</div>
								<div class="s-content">
								@foreach($collection as $k=>$v)
									@if($v['uid']==session('user')['id'])
									@foreach($goods as $gk=>$gv)
									@if($v['gid']==$gv['id'])

									<div class="s-item-wrap">
										<div class="s-item">
												
											<div class="s-pic">
												<a href="#" class="s-pic-link">
													<img src="/{{$gv['pic']}}" class="s-pic-img s-guess-item-img">
												</a>
											</div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$gv['reprice']}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$gv['price']}}</em></span>

											</div>
											<div class="s-title"><a href="#" title="{{$gv['title']}}">{{$gv['title']}}</a></div>
											<div class="s-extra-box">
											
											</div>
										</div>
									
									</div>
									@endif
									@endforeach
									@endif
									@endforeach
									

								</div>

								<div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>更多</div>

							</div>

						</div>
						

@endsection