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
    	<form class="mws-form" action="/admin/permission/auth" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">角色名</label>
    				<div class="mws-form-item">
                        <input type="hidden" name="role_id" value="{{$role->id}}">
    					<input type="text" class="small" name="name" value="{{$role->name}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">相关权限</label>
    				<div class="mws-form-item">
    					 @foreach($per as $k=>$v)
                            @if(in_array($v->id ,$own_pers))
                                <label for=""><input type="checkbox" checked name="permission_id[]" value="{{$v->id}}">{{$v->description}}</label> &nbsp;
                                @else
                                <label for=""><input type="checkbox"  name="permission_id[]" value="{{$v->id}}">{{$v->description}}</label> &nbsp;
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