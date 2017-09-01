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
    	<span></span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/auser/auth" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
    					<input type="text" class="small" name="name" readonly value="{{$user->username}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">相关角色</label>
    				<div class="mws-form-item">
    					    @foreach($roles as $k=>$v)
                                {{--如果当前角色拥有这个权限--}}
                                @if(in_array($v->id ,$own_roles))
                                <label for=""><input type="checkbox" checked name="role_id[]" value="{{$v->id}}">{{$v->name}}</label>
                                @else
                                <label for=""><input type="checkbox"  name="role_id[]" value="{{$v->id}}">{{$v->name}}</label>
                                @endif
                            @endforeach
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