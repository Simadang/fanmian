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
    	<form class="mws-form" action="/admin/user/{{$data['id']}}" method="post">
        <input type="hidden" name="_method" value="PUT">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="username" value="{{$data['username']}}" readonly>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="phone" value="{{$data['phone']}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input type="email" class="small" name="email" value="{{$data['email']}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">权限</label>
    				<div class="mws-form-item">
    					<select class="small" name="authority" aria-controls="DataTables_Table_1">
			                <option value="0" @if(!empty($data['authority']) && $data['authority'] == 0) selected @endif>普通用户</option>
			                <option value="1" @if(!empty($data['authority']) && $data['authority'] == 1) selected @endif>盆主</option>
			            </select>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="修改" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn">
    		</div>
    	</form>
    </div>    	
</div>
@endsection