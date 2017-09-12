@extends('home.layout.left')
@section('left')


					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class=""><a href="#tab1">所有订单</a></li>
								<li class=""><a href="#tab2">待付款</a></li>
								<li class=""><a href="#tab3">待发货</a></li>
								<li class=""><a href="#tab4">待收货</a></li>
								<li class="am-active"><a href="#tab5">待评价</a></li>
							</ul>
							
							<div class="am-tabs-bd" style="touch-action: pan-y; -moz-user-select: none;">
								
							

								<div class="am-tab-panel am-fade" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>
										
									<div class="order-main">
										<div class="order-list">
											
											@foreach($arr as $k=>$v)
											<!--交易失败-->
											<div class="order-status0">
											
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{ $v['code'] }}</a></div>
													<span>成交时间：{{ $v['ordertime'] }}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/h/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{ $v['title'] }}</p>
																			<p class="info-little">{{ $v['intro'] }}
																				</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $v['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $v['num'] }}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>

														
													</div>
													
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{ $v['cost'] }}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易关闭</p>
																</div>
															</li>
															<li class="td td-change">
																
															<a href="javascript:void(0);"><button class="am-btn am-btn-danger anniu">{{ $v['status'] }}</button></a>
															</li>
														</div>
													</div>
												</div>
											</div>											
										@endforeach	
											

										</div>

									</div>
								
								</div>
									
								
								
								
								<div class="am-tab-panel am-fade" id="tab2">

									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
										@foreach($daifukuan as $k1=>$v1)
											<div class="order-status1">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{ $v1['code'] }}</a></div>
													<span>成交时间：{{ $v1['ordertime'] }}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/h/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{ $goods1[0]['title'] }}</p>
																			<p class="info-little">{{ $goods1[0]['intro'] }}
																				</p>
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $goods1[0]['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $goods1[0]['num'] }}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>

														
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{ $v1['cost'] }}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<!-- <p class="Mystatus">等待买家付款</p> -->
																	<!-- <p class="order-info"><a href="#">取消订单</a></p> -->

																</div>
															</li>
															<li class="td td-change">
																<a href="{{ url('/pay/?code='.$v['code']) }}"><button class="am-btn am-btn-danger anniu">{{ $v1['status'] }}</button></a>
															</li>
														</div>
													</div>

												</div>
											</div>
													@endforeach

										</div>

									</div>
								</div>
								
								
								<div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
										@foreach($weifahuo as $k2=>$v2)
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{ $v2['code'] }}</a></div>
													<span>成交时间：{{ $v2['ordertime'] }}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/h/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{ $goods2[0]['title'] }} </p>
																			<p class="info-little">{{ $goods2[0]['intro'] }}
																				</p>
																			}
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $goods2[0]['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $goods2[0]['num'] }}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款</a>
																</div>
															</li>
														</ul>

														
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{ $v2['cost'] }}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<!-- <p class="order-info"><a href="orderinfo.html">订单详情</a></p> -->
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	{{ $v2['status'] }}</div>
															</li>
														</div>
													</div>
												</div>
											</div>
										@endforeach
										</div>
									</div>
								</div>
								
								
								<div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
										@foreach($yifahuo as $k3=>$v3)
											<div class="order-status3">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{ $v3['code'] }}</a></div>
													<span>成交时间：{{ $v3['ordertime'] }}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/h/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{ $goods3[0]['title'] }} </p>
																			<p class="info-little">{{ $goods3[0]['intro'] }}
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $goods3[0]['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $goods3[0]['num'] }}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{ $v3['cost'] }}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<!-- <p class="order-info"><a href="orderinfo.html">订单详情</a></p> -->
																	<!-- <p class="order-info"><a href="logistics.html">查看物流</a></p> -->
																	<!-- <p class="order-info"><a href="#">延长收货</a></p> -->
																</div>
															</li>
															<li class="td td-change">
																<a href="{{ url('/order/status/?status='.$v['status']) }}"><button class="am-btn am-btn-danger anniu">{{ $v3['status'] }}</button></a>
															</li>
														</div>
													</div>
												</div>
											</div>
										@endforeach
										</div>
									</div>
								</div>
								
								
								<div class="am-tab-panel am-fade am-active am-in" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											商品
										</div>
										<div class="th th-price">
											单价
										</div>
										<div class="th th-number">
											数量
										</div>
										<div class="th th-operation">
											商品操作
										</div>
										<div class="th th-amount">
											合计
										</div>
										<div class="th th-status">
											交易状态
										</div>
										<div class="th th-change">
											交易操作
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<!--不同状态的订单	-->
											@foreach($daipingjia as $k4=>$v4)
										<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{ $v4['code'] }}</a></div>
													<span>成交时间：{{ $v4['ordertime'] }}</span>

												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/h/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{ $goods4[0]['title'] }}</p>
																			<p class="info-little">{{ $goods4[0]['intro'] }}
																				</p>
																			}
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $goods4[0]['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $goods4[0]['num'] }}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{ $v4['cost'] }}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<!-- <p class="order-info"><a href="orderinfo.html">订单详情</a></p> -->
																	<!-- <p class="order-info"><a href="logistics.html">查看物流</a></p> -->
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		{{ $v4['status'] }}</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>
											
											
											<div class="order-status4">
												
												<div class="order-content">
													
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{ $v4['cost'] }}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<!-- <p class="order-info"><a href="orderinfo.html">订单详情</a></p> -->
																	<!-- <p class="order-info"><a href="logistics.html">查看物流</a></p> -->
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		{{ $v4['status'] }}</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>

											@endforeach
										</div>

									</div>

								</div>
								
							</div>

						</div>
					</div>
				

@endsection