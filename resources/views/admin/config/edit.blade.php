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
    <form class="mws-form" action="/admin/config/{{$data['id']}}" method="post">
        <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input type="text" name="title" value="{{$data['title']}}" readonly>
                        <span><i class="fa fa-exclamation-circle yellow"></i></span>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">名称</label>
                    <div class="mws-form-item">
                        <input type="text" name="name" value="{{$data['name']}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i></span>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">类型</label>
                    <div class="mws-form-item">
                        <td>
                            <input type="radio" name="type" value="input" checked onclick="showTr(this)">input　
                            <input type="radio" name="type" value="textarea" onclick="showTr(this)">textarea　
                            <input type="radio" name="type" value="radio" onclick="showTr(this)">radio
                        </td>
                    </div>
                </div>
                <div class="mws-form-row hidden" style="display:none">
                    <label class="mws-form-label">类型值</label>
                    <div class="mws-form-item">
                        <input type="text" class="lg" name="value">
                            <span><i class="fa fa-exclamation-circle yellow"></i>格式 1|开启,0|关闭</span>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">说明</label>
                    <div class="mws-form-item">
                        <textarea name="tips" class="lg">{{$data['tips']}}</textarea>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">内容</label>
                    <div class="mws-form-item">
                        <input type="text" name="content" value="{{$data['content']}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i></span>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">排序</label>
                    <div class="mws-form-item">
                        <input type="text" class="sm" name="order" value="{{$data['order']}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i></span>
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

<script>

    function showTr(obj){
       var ele_type =  $(obj).val();
       if(ele_type == 'radio'){
           $('.hidden').show();
       }else{
           $('.hidden').hide();
       }
    }

</script>
@endsection