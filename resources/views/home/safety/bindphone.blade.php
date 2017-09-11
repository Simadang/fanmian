@extends('home.layout.left')
@section('left')

<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定手机</strong> / <small>Bind&nbsp;Phone</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">绑定手机</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
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
					<form class="am-form am-form-horizontal" action="{{ url('safety/update') }}" method="post">
						
							{{ csrf_field() }}
						<div class="am-form-group bind">
							<label for="user-phone" class="am-form-label">验证手机</label>
							<div class="am-form-content">
								<!-- <span id="phone">{{ $user['phone'] }}</span> -->
								<input type="tel" name="phone" id="phone"value="{{ $user['phone'] }}" placeholder="请输入手机号">
								<span id='yanzheng3' style="color:red;font-size:12px;display:none">手机号已存在</span>
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input id="code" placeholder="短信验证码" type="tel" name="phonecode">
							</div>
							<a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
								<div class="am-btn am-btn-danger"><span id="dyMobileButton">验证码</span></div></a>
						</div>
						  <script type="text/javascript">
      					function sendMobileCode(){

			            var preg_phone = /^1[3|4|5|7|8|9]\d{9}$/;

			            var r = preg_phone.test($('#phone').val());
			            	// alert($('#phone').val());
			            if(r){


			              $.post("{{ url('safety/yanzheng3') }}",{'phone':$('#phone').val(),'_token':'{{csrf_token()}}'},function(msg){

			                  if(msg == 1){

			                   $('#yanzheng3').hide();
			                    $.get('/phoneCode',{'phone':$('#phone').val()},function(msg){
			                      if(msg == 2){
			                        alert('验证码已发送');
			                      }
			                    });
			                  }else if(msg == 0){
			                  		alert('33333333');
			                    // $('#yanzheng3').hide();
			                    // $.get('safety/phoneCode',{'phone':$('#phone').val()},function(msg){
			                    //   if(msg == 2){
			                    //     alert('验证码已发送');
			                    //   }
			                    // });
			                  }

			                  
			              })
			              
			            }else{

			              alert('请输入正确的手机号');

			            }
			            
			          }
          </script>
						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">新手机</label>
							<div class="am-form-content">
								
								<input id="phone" placeholder="绑定新手机号" type="tel" name="phone">
							<!-- <span id='yanzheng4' style="color:red;font-size:12px;display:none">手机号已存在</span> -->
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">确认新手机</label>
							<div class="am-form-content">
								
								<input id="phone" placeholder="绑定新手机号" type="tel" name="rephone">
							<!-- <span id='yanzheng4' style="color:red;font-size:12px;display:none">手机号已存在</span> -->
							</div>
						</div>
						
						
						<div class="info-btn">
							<button class="am-btn am-btn-danger">保存修改</button>
						</div>

					</form>

				</div>
@endsection