@extends('admin.layout.index')

@section('content')

@if (count($errors) > 0)
    <div class="mws-form-message warning">
    	验证失败
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>{{ $title }}</span></div>
  <div class="mws-panel-body no-padding">
    <form class="mws-form" action="/admin/link" method="post">
    {{ csrf_field() }}
      <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">友情链接名称</label>
          <div class="mws-form-item">
            <input type="text" class="small" name='title' value="{{old('title')}}"> 
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">友情链接地址</label>
          <div class="mws-form-item">
            <input type="text" class="small" name='url' value="{{old('url')}}"> 
          </div>
        </div>
        <div class="mws-form-row">
          <label class="mws-form-label">是否发布</label>
          <div class="mws-form-item">
            <select class="small" name='status'>
              <option value='1'>不展示</option>
              <option value='0' selected>展示</option>
             </select>
          </div>
        </div>
      </div>
      <div class="mws-button-row">
        <input type="submit" value="提交" class="btn btn-danger">
        <input type="reset" value="重置" class="btn "></div>
    </form>
  </div>
</div>
@endsection