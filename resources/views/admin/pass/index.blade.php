@extends('admin.layout.index')
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>修改用户密码</span>
                    </div>
                    <div class="mws-panel-body no-padding">
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
                    	<form class="mws-form" action="{{ url('admin/pass') }}" method="post" id="defaultForm">

                    			{{ csrf_field() }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">原密码</label>
                    				<div class="mws-form-item">
                    					<input class="small" type="password"name="oldpassword"value="" placeholder="请输入原密码">
                    				</div>
                    			</div>
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">新密码</label>
                    				<div class="mws-form-item">
                    					<input class="small" type="password"name="password"value="" placeholder="请输入新密码">
                    				</div>
                    			</div>	
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">确认密码</label>
                    				<div class="mws-form-item">
                    					<input class="small" type="password"name="repassword"value="" placeholder="请再次输入新密码">
                    				</div>
                    			</div>	
                    		
                    		
                    		<div class="mws-button-row">
                    			<input value="修改" class="btn btn-danger" type="submit" >
                    			<input value="重置" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
		

@endsection