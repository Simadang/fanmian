@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>分类管理</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>分类名称</th>
                    <th>父级ID</th>
                    <th>分类路径</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
                <tr>
                    <td>{{$v['id']}}</td>
                    <td>{{$v['name']}}</td>
                    <td>{{$v['pid']}}</td>
                    <td>{{$v['path']}}</td>
                    <td><a href="/admin/type/status/{{ $v['id'] }}">{{$v['status'] == 0 ? '启用' : '禁用'}}</a></td>
                    <td align="center">
                    	<a href="/admin/type/delete/{{$v['id']}}">删除</a>　
                    	<a href="/admin/type/edit/{{$v['id']}}">修改</a>　
                    	<a href="/admin/type/create/{{$v['id']}}">添加子分类</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection