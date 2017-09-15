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
																
															<a href="javascript:void(0);"><button class="am-btn am-btn-danger anniu">{{ $v['status']==0?'待付款':($v['status']==1?'待发货':($v['status']==2?'待收货':'待评价')) }}</button></a>
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
										@foreach($arr1 as $k1=>$v1)
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
																			<p>{{ $v1['title'] }}</p>
																			<p class="info-little">{{ $v1['intro'] }}
																				</p>
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $v1['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $v1['num'] }}
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
																<a href="{{ url('/pay/?code='.$v['code']) }}"><button class="am-btn am-btn-danger anniu">{{ $v1['status']==0 ?'去付款':'' }}</button></a>
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
										@foreach($arr2 as $k2=>$v2)
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
																			<p>{{ $v2['title'] }} </p>
																			<p class="info-little">{{ $v2['intro'] }}
																				</p>
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $v2['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $v2['num'] }}
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
																	{{ $v2['status']==1?'待发货':'' }}</div>
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
										@foreach($arr3 as $k3=>$v3)
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
																			<p>{{ $v3['title'] }} </p>
																			<p class="info-little">{{ $v3['intro'] }}
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $v3['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $v3['num'] }}
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
																<button class="am-btn am-btn-danger anniu" onclick="confirm({{$v3['code']}})">{{ $v3['status']==2?'点击确认收货':'' }}</button>
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
											@foreach($arr4 as $k4=>$v4)
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
																			<p>{{ $v4['title'] }}</p>
																			<p class="info-little">{{ $v4['intro'] }}
																				</p>
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{ $v4['reprice'] }}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{ $v4['num'] }}
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
																		{{ $v4['status']==3?'待评价':'' }}</div>
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
				
<script type="text/javascript">
	
	function confirm(code){

		$.post('{{url('order/confirm')}}',{'_token':'{{csrf_token()}}','code':code},function(msg){

				// console.log(code);
                if(msg == 1){

                	layer.msg('已确认收货');
                    location.href = location.href;
                }else if(msg == 0){

                	layer.msg('提交失败,请稍后重新再试');
                    location.href = location.href;
                }

        });
	}
</script>>
@endsection