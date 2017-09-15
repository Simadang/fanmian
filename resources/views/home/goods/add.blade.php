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

        <link href="/h/css/personal.css" rel="stylesheet" type="text/css">
        <link href="/h/css/refstyle.css" rel="stylesheet" type="text/css">

        <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
  
    </head>

<!-- 需要用户的登录才能实现不然报错 -->
<div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商品上架</strong> / <small>Goods</small></div>
</div>
<hr>

@if (count($errors) > 0)
    <div style="color:red; border:1px gray dashed; cursor:pointer" onclick="$(this).hide()">
      添加失败
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

<div class="info-main">
    <form class="am-form am-form-horizontal" action="{{ url('home/goods') }}" method="post" id="slide_form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="am-form-group">
            <label for="user-name2" class="am-form-label">商品标题</label>
            <div class="am-form-content">
                <input type="text" name="title" placeholder="请输入商品标题">
            </div>
        </div>

        <input type="hidden" name="uid" value="{{ $uid }}">

        <div class="am-form-group">
            <label for="user-name" class="am-form-label">商品封面</label>
            <div class="am-form-content">
                 <input id="file_upload" name="file_upload" type="file" multiple="true">
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name2" class="am-form-label">商品数量</label>
            <div class="am-form-content">
                <input type="text" name="num" placeholder="请输入商品数量(单位:个)">
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-name2" class="am-form-label">商品原价</label>
            <div class="am-form-content">
                <input type="text" name="price" placeholder="请输入商品原价(单位:元)">
            </div>
        </div>
        
        <div class="am-form-group">
            <label for="user-name2" class="am-form-label">商品售价</label>
            <div class="am-form-content">
                <input type="text" name="reprice" placeholder="请输入您想卖出的价格(单位:元)">
            </div>
        </div>


        <div class="item-comment">
            <div class="am-form-group">
                <label for="refund-type" class="am-form-label">商品成色</label>
                <div class="am-form-content">
                    <select name="condition">
                        <option value="0" selected="">九九新</option>
                        <option value="1">九成新</option>
                        <option value="2">八成新</option>
                        <option value="3">七成新</option>
                        <option value="3">垃圾成色</option>
                    </select>
                </div>
            </div>
            
            <div class="am-form-group">
                <label for="refund-reason" class="am-form-label">商品分类</label>
                <div class="am-form-content">
                    <select  name="tid">
                    <option value="" selected="">请选择商品分类</option>
                    @foreach($data as $k=>$v)
                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-name" class="am-form-label">商品详情1</label>
                <div class="am-form-content">
                     <input id="file_upload" name="file_upload1" type="file" multiple="true">
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-name" class="am-form-label">商品详情2</label>
                <div class="am-form-content">
                     <input id="file_upload" name="file_upload2" type="file" multiple="true">
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-name" class="am-form-label">商品详情3</label>
                <div class="am-form-content">
                     <input id="file_upload" name="file_upload3" type="file" multiple="true">
                </div>
            </div>

            <div class="am-form-group">
                <label for="refund-info" class="am-form-label">商品描述</label>
                <div class="am-form-content">
                    <textarea name="intro" placeholder="请输入本商品描述"></textarea>
                </div>
            </div>
        </div>
            
            <br><br><br><br>

        <div class="info-btn">
            <input type="submit" style="height:40px" align="center" value="上架商品">
        </div>
    </form>
</div>

@endsection