@extends('home.layout.left')

@section('left')
<script src="/h/My97DatePicker/WdatePicker.js"></script>
<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人信息</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<input class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" type="file">
								<img class="am-circle am-img-thumbnail" src="{{ $info[0]['photo'] }}" alt="">
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{ $user['username'] }}</i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 用户积分
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">{{ $info[0]['code'] }}</i></span>
									</a>
								</div>
							</div>
						</div>

						<!--个人信息 -->
						<div class="info-main">
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
							<form class="am-form am-form-horizontal" action="{{ url('user/update') }}" method="post">
										{{ csrf_field() }}
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input id="user-name2" name="nickname" value="{{ $info[0]['nickname'] }}" placeholder="nickname" type="text">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input id="user-name2" name="username" placeholder="name" value="{{ $user['username'] }}" type="text">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
											<label class="am-radio-inline">
											<input type="radio" name="sex" value="0" data-am-ucheck    {{ $info[0]['sex']=='0' ? 'checked' : '' }}> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" data-am-ucheck    {{ $info[0]['sex']=='1' ? 'checked' : '' }}> 女
										</label>
										
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<input type="text" class="Wdate birth-select" onClick="WdatePicker()" name="birthday" value="{{ $info[0]['birthday'] }}">
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="phone" value="{{ $user['phone'] }}" placeholder="telephonenumber" type="tel">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" name="email" value="{{ $user['email'] }}" placeholder="Email" type="email">

									</div>
								</div>
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<input type="submit" class="am-btn am-btn-danger" value="保存修改">
								</div>

							</form>
						</div>

					</div>


@endsection