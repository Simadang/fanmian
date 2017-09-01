@extends('admin.layout.index')

@section('content')
@if (count($errors) > 0)
	<div class="mws-form-message error">
    	<ul>
        	@foreach ($errors->all() as $error)
            	<li>{{ $error }}</li>
        	@endforeach
  	  	</ul>
	 </div>
@endif

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/auser" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="username" value="{{old('username')}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">密码</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="password" >
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">确认密码</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="repassword">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">权限</label>
    				<div class="mws-form-item">
    					<select class="small" name="status" aria-controls="DataTables_Table_1">
			                <option value="0">普通管理员</option>
			                <option value="1">超级管理员</option>
			            </select>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="添加" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn">
    		</div>
    	</form>
    </div>    	
</div>
@endsection