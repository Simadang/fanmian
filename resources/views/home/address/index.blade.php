@extends('home.layout.left')
@section('left')
		

					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
							@foreach($address as $_address)

							@if($_address['status']==0)
							<li class="user-addresslist defaultAddr">
							@else
							<li class="user-addresslist">
							@endif

								<input type="hidden" name="uid" value="{{$_address['id']}}" />
								<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
							
								<p class="new-tit new-p-re">
									<span class="new-txt">收件人姓名:{{ $_address['name']}}</span>
								</p>
								<p class="new-tit new-p-re">
									<span class="new-txt-rd2">收件人电话:{{ $_address['phone']}}</span>
								</p>
								<p class="new-mu_l2a new-p-re">
									<span class="title">收货地址:{{ $_address['address'] }}</span>
								</p>
								
								<div class="new-addr-btn">
									<a href="/address/{{ $_address['id'] }}/edit"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
								
									<a href="/address/del/{{$_address['id']}}"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							@endforeach

						</ul>
						

						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" method="post" action="/address">

									{{csrf_field()}}

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" name="name" id="user-name" placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input name="phone" type="text">
											</div>
										</div>
									

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea name="address" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
												
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input type="submit" value="提交" >
												<input type="reset" value="取消" >
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

					<div class="clear"></div>
@endsection