@extends('home.layout.index')
@section('content')
  <div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>鱼塘回复内容页</span>
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
                    	<form class="mws-form" action="{{ url('home/question/reply') }}" method="post" id="defaultForm" enctype="multipart/form-data">

                    			{{ csrf_field() }}
                    			@foreach($res as $k=>$v)
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">鱼塘评论{{$k}}</label>
                    				<div class="mws-form-item">
										
                    					
                    					<input class="small" type="text"name="uid"value="{{ $v['content'] }}">
                    					
                    				</div>
                    			</div>

	                    			

                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">回复{{ $k }}</label>
                    				<div class="mws-form-item">
                    					<input type="text"name="content"value="">			
                    				</div>
                    			</div>	
                    		<div class="mws-button-row">
                    			<input value="提交" class="btn btn-danger" type="submit" >
                    			
                    		</div>
                    		@endforeach
                    		
                    		
                    	</form>
                    </div>    	
                </div> 

   


@endsection