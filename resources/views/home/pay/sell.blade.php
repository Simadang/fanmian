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
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								
								<li><a href="#tab3">待发货</a></li>
								
							</ul>

							<div class="am-tabs-bd" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
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
										@foreach($data as $k4=>$v4)	
											<!--交易成功-->
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{ $v4['code'] }}</a></div>
													<span>成交时间：{{ $v4['ordertime'] }}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{ $v4['title'] }}</p>
																			<p class="info-little">{{ $v4['intro'] }}</p>
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
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
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
										@foreach($arr1 as $k=>$v)
											<div class="order-status2">
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
																		<img src="images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{ $v['title'] }} </p>
																			<p class="info-little">{{ $v['intro'] }}</p>
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
																	<a href="refund.html">退款</a>
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
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change" onclick="confirm({{$v['rid']}},{{$v['gid']}})">
																<div class="am-btn am-btn-danger anniu">
																	发货</div>
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
	
	function confirm(rid,gid){

		$.post('{{url('pay/confirm')}}',{'_token':'{{csrf_token()}}','rid':rid,'gid':gid},function(msg){

			// console.log(msg);
                if(msg == 1){

                	layer.msg('已发货');
                    location.href = location.href;
                }else if(msg == 0){

                	layer.msg('提交失败,请稍后重新再试');
                    location.href = location.href;
                }

        });
	}
</script>>

@endsection