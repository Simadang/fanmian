@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>轮播图添加</span>
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
                    	<form class="mws-form" action="{{ url('admin/slide') }}" method="post" id="defaultForm" enctype="multipart/form-data">

                    			{{ csrf_field() }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">照片名</label>
                    				<div class="mws-form-item">
                    					<input class="small" type="text"name="pic"value="">
                    				</div>
                    			</div>
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">url地址</label>
                    				<div class="mws-form-item">
                    					<input class="small" type="file"name="url"value="">
                    				</div>
                    			</div>	
                    		
                    		
                    		
                    		<div class="mws-button-row">
                    			<input value="添加" class="btn btn-danger" type="submit" >
                    			
                    		</div>
                    	</form>
                    </div>    	
                </div>

@endsection