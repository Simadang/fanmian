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
		<script src="/h/js/pcasunzip.js" charset="gb2312"></script>
		<script type="text/javascript">
				function getValue(){ 
				var getpro=document.getElementById("province").value;
				var getcity=document.getElementById("city").value;
				var getarea=document.getElementById("area").value;
				alert(getpro+" "+getcity+" "+getarea);
				 }
</script>

	</head>

	<body>
	
		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						<a href="/h/#" target="_top" class="h">亲，请登录</a>
						<a href="/h/#" target="_top">免费注册</a>
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="/h/#" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="/h/#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="/h/#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="/h/#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/h/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/h/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="/h/#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>
			<div class="concent">
			
	<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>添加地址</small></div>
				</div>
				<hr/>
				
				<div class="am-u-md-12" style="width:300px">
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
					<form class="am-form am-form-horizontal" method="post" action="{{ url('pay/update/'.$res['id']) }}">
									{{ csrf_field() }}
						<div class="am-form-group ">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" placeholder="收货人"name="name" value="{{ $res['name']}}" class="small">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" type="text"name="phone" value="{{$res['phone']}}">
							</div>
						</div>

						<div class="am-form-group">
							
							<div class="am-form-content address">
								
							</div>
						</div>
						
						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content" style="float:left">
								<fieldset style="padding:5px;">
								<legend>省市地区联动</legend>
								出　　 生 　地：<select name="user.province" id="province"></select>
												<select name="user.city" id="city"></select>
												<select name="user.area" id="area"></select><br>
												<script language="javascript" defer>
								new PCAS("user.province","user.city","user.area","山东省","济南市","济南市");

								</script>
								 <input type="button" name="bt" id="bt" value="测试" onclick="getValue()">
								</fieldset>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<input type="submit"value="修改"/>
								<!-- <a href="{{ url('pay') }}"><button>取消</button></a> -->
								
							</div>
						</div>
						<!-- <a href="{{ url('pay') }}"><button>取消修改</button></a> -->
					</form>
					
						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
					<a href="{{ url('pay') }}"><button>取消修改</button></a>
				</div>
			</div>
				</div>

			</div>
				
			<div class="clear"></div>
			
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

			
	</body>

</html>