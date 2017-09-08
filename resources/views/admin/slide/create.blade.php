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
                    	<form class="mws-form" action="{{ url('admin/slide') }}" method="post" id="slide_form" enctype="multipart/form-data">

                    			{{ csrf_field() }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">url</label>
                    				<div class="mws-form-item">
                    					<input class="small" type="text" name="url"  id="pic">
                                                <br><br>
                                    <br><br>
                                            {{--文件上传插件--}}
                                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                    				 <br><br>
                                    <br><br>
                                     <p><img id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>

                                    </div>
                    			</div>
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">照片名</label>
                    				<div class="mws-form-item">
                    					<input class="small" type="text"name="pic"value="">
                    				</div>
                    			</div>	
                    		
                    		
                    		
                    		<div class="mws-button-row">
                    			<input value="添加" class="btn btn-danger" type="submit" >
                    			
                    		</div>
                    	</form>
                    </div>    	
                </div>
 <script type="text/javascript" src="/d/jquery/jquery-1.8.3.min.js"></script>
 <script type="text/javascript">
        $(function () {
            $("#file_upload").change(function () {
                uploadImage();
            });
        });

        function uploadImage() {
    //                            判断是否有选择上传文件
            var imgPath = $("#file_upload").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }
//                            var myform = document.getElementById('art_from');
            var formData = new FormData($('#slide_form')[0]);
            {{--formData.append('_token', '{{csrf_token()}}');--}}
                                        {{--console.log(formData);--}}
            $.ajax({
                type: "POST",
                url: "/admin/upload",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                                   // console.log(data);
                                   // alert("上传成功");
//                    $('#img1').attr('src','http://ovf9o4wws.bkt.clouddn.com/'+data);
//                    http://project187.oss-cn-shanghai.aliyuncs.com/uploads/201708290957357759.jpg
                   $('#img1').attr('src','/'+data);
                    $('#pic').val(data);

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }

    </script>           
@endsection