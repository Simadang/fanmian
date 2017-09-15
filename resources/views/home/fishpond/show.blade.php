<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>{{ Config::get('app.title') }}</title>

		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/h/css/skin.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			#page_page {
			    color: #ffffff;
			    float: left;
			    padding: 2px;
			    margin: 10px 8px 10px 0;
			    background-color: rgba(0, 0, 0, 0.15);
    		}

			#page_page li {
			    float: left;
			    height: 20px;
			    padding: 0 10px;
			    display: block;
			    font-size: 12px;
			    line-height: 20px;
			    text-align: center;
			}
		</style>
		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

		<link href="/h/css/seastyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/h/js/script.js"></script>

		<script type="text/javascript" src="{{asset('d/layer/layer.js')}}"></script>
	</head>
	<article>
				<div class="mt-logo">
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
						<div class="menu-hd MyShangcheng"><a href="/h/#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="/h/#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="/h/images/logo-search.png"></li>
							</div>

							<div class="search-bar pr">
								<ul>
									<li style="font-size:25px; color:red;">{{$question['content']}}</li>
									<li style="color:red;">用户名:{{$question['username']}}</li>
									<li style="color:red;">提问时间:{{$question['ctime']}}</li>
								</ul>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				
			</article>

	<body class="am-container header">
		
		<div style="margin-top:50px; margin-bottom:50px;">

			@foreach($answer as $k=>$v)
			<div id="floor" style="font-size:15px; margin-top:20px; margin-bottom:20px; background-color:#ccc; ">
				<p>用户名:{{$v->username}}</p>
				<a href="javascript:;" class="yinyong" style="float:right;margin-right:20px;">引用</a>
				<p style="font-size:15px;">留言时间:{{$v->ctime}}</p>
				<div style="background-color:#FFFFEE">{!!$v->content!!}</div>
			</div>
			<div style="display:none;">
				<input type="text" value="" />
				<input type="button" id="id{{$v->id}}" value="提交" onclick="sendGz({{$v->id}},{{$question['tid']}},{{$question['qid']}})" />
			</div>
			@endforeach
			
			<div class="dataTables_info"  id="page_page" style="">
            	{!! $answer->appends(['tid'=>$question['tid']])->appends(['qid'=>$question['qid']])->appends(['content'=>$question['content']])->appends(['ctime'=>$question['ctime']])->render() !!}
        	</div>
			
        	<div style="margin-top:55px;">

        		<!-- 配置文件 -->
				<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                <!-- 编辑器源码文件 -->
                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
				发表回复
                <script id="editor" type="text/plain" name="art_content" style="width:455px;height:220px;"></script>

                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                
                
				<input type="button" value="回复" id="huifu" onclick="sendContent({{$question['tid']}},{{$question['qid']}})"/>
				<!-- 实例化编辑器 -->
                <script>
                    var ue = UE.getEditor('editor');

                    //发送回复内容
                    function sendContent(tid,qid){

                    	//js获取百度编辑器输入内容
						var content = ue.getContent() 

						//判断提交的内容是否为空
						if(content){
							//ajax 发送回复
							$.post('{{url('home/fishpond/answer')}}',{'content':content,'_token':'{{csrf_token()}}','tid':tid,'qid':qid},function(msg){

								// console.log(msg);
								if(msg == 1){

		        					location.href = location.href;
		        				}else if(msg == 0){

		        					layer.tips('添加失败', '#question');
		        					location.href = location.href;
		        				}
							});
						}else{

							layer.tips('不能提交空内容', '#huifu', {
							  tips: [1, '#3595CC'],
							  time: 4000
							});
							return false;
						}
						
					}

					//盖楼
					$('.yinyong').toggle(

						function(){

							$(this).parent().next().show();
						},

						function(){

							$(this).parent().next().hide();
						}
					)

					//发送盖楼内容
					function sendGz(id,tid,qid){

						//获取回复楼层的内容
						var gz = $("#id"+id).prev().val();
						
						//判断值是否
						if(gz){

							//ajax发送盖楼的内容
							$.post('{{url('home/fishpond/gl')}}',{'_token':'{{csrf_token()}}','content':gz,'pid':id,'tid':tid,'qid':qid},function(msg){

								// console.log(msg);
								if(msg == 1){

		        					location.href = location.href;
		        				}else if(msg == 0){

		        					layer.tips('添加失败', '#question');
		        					location.href = location.href;
		        				}
							});
						}else{

							layer.tips('不能提交空内容', '#id'+id, {
							  tips: [1, '#3595CC'],
							  time: 4000
							});
							return false;
						}
					}

					
                </script>
        	</div>
			
		</div>
	</body>
