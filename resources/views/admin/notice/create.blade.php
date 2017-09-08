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
                    	<span>公告添加</span>
                    </div>
                  <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/notice" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">公告标题</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="title">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">公告内容</label>
    				<div class="mws-form-item">
                        <!-- 配置文件 -->
    					<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>

                        <script id="editor" type="text/plain" name="art_content" style="width:455px;height:320px;"></script>

                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                        
                        <!-- 实例化编辑器 -->
                        <script>
                                var ue = UE.getEditor('editor');
                        </script>

                        <style>
                                /*.edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}*/
                        </style>
    				</div>
    			</div>
    			
    			
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="添加" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
                    </div>    	
                </div>
@endsection