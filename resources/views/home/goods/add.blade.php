@extends('home.layout.left')

@section('left')
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

        <title>个人资料</title>

        <link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
        <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

        <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
        <link href="/h/css/infstyle.css" rel="stylesheet" type="text/css">
        <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
            
    </head>

<!-- 需要用户的登录才能实现不然报错 -->
<div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商品上架</strong> / <small>Goods</small></div>
</div>
<hr>
<div class="mws-panel grid_8">
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
      
    </div>      
</div>



<div class="info-main">
        <form class="am-form am-form-horizontal" action="{{ url('admin/slide') }}" method="post" id="slide_form" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="am-form-group">
            <label for="user-name2" class="am-form-label">商品标题</label>
            <div class="am-form-content">
                <input type="text" id="title" placeholder="title">
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name" class="am-form-label">URL地址</label>
            <div class="am-form-content">
                <input type="text" name="url"  id="pic" placeholder="" readonly>

            </div>
        </div>

        <div class="mws-form-row">
            <br><br>
                    {{--文件上传插件--}}
            <input id="file_upload" name="file_upload" type="file" multiple="true">
             <br><br>
            <br><br>
             <p style="color:#aaa"><img id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:300px;" /></p>
        </div>
        <br><br>
        <div class="info-btn">
            <div class="am-btn am-btn-danger">上架商品</div>
        </div>

    </form>
</div>
<script type="text/javascript" src="/h/js/jquery-1.8.3.min.js"></script>
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