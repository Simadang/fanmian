@extends('home.layout.left')
@section('left')
<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定邮箱</strong> / <small>Email</small></div>
					</div>
					<hr>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">验证邮箱</p>
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
					<form class="am-form am-form-horizontal" action="{{ url('safety/doemail') }}" method="post">
							{{ csrf_field() }}

						<div class="am-form-group">
							<label for="user-email" class="am-form-label">验证邮箱</label>
							<div class="am-form-content">
								<input id="email" placeholder="请输入邮箱地址" type="email" name="email">
							 <span id='yanzheng1' style="color:red;font-size:12px;display:none">邮箱已被注册</span>
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input id="code" placeholder="验证码" type="tel" name="code">
							</div>
							<a class="btn" href="javascript:void(0);" onClick="send()" id="sendMobileCode">
								<div class="am-btn am-btn-danger">验证码</div>
							</a>
							<script type="text/javascript">
										function send(){
											var preg_email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;

											var r = preg_email.test($('#email').val());

											// alert($('#email').val());
											if(r){
												$.post("{{ url('safety/yanzheng1') }}",{'email':$('#email').val(),'_token':'{{csrf_token()}}'},function(data){
												 if(data == 1){
												 			
											            $('#yanzheng1').show();
											          }else if(data == 0){
											          	// alert('444444444444');
											          	//发送验证码操作
											          	$.post("/safety/yanzheng",{'email':$('#email').val(),'_token':'{{csrf_token()}}'},function(msg){
											          			// if(msg == 2){
											          				alert('验证码已发送');
											          			// }
											          	});	
											          }else{
											          	alert('请输入正确的格式的邮箱');
											          }
												})
											}



										}
								
					
						</script>
						</div>
						
						<div class="info-btn">
							<button class="am-btn am-btn-danger">保存修改</button>
						</div>

					</form>

				</div>

@endsection