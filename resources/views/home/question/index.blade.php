@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>鱼塘管理</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>模块id</th>
                    <th>用户ID</th>
                    <th>鱼塘内容</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
                <tr>
                   <td>{{ $v['id'] }}</td>
                   <td>{{ $v['tid'] }}</td>
                 
                   <td>{{ $v['uid'] }}</td>
                   <td>{{ $v['content'] }}</td>                  
                    <td align="center">
                    	<a href="javascript:void(0)" onclick="delUser({{$v->uid,$v['content']}})">查看回复列表</a>　
                    	<!-- <a href="">管理员回复</a>　 -->
                    	<!-- <a href="">查看本鱼塘内容</a>　 -->
                    	<!-- <a href="{{ url('admin/question/') }}">回收站</a> -->
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>

	// 显示问题列表的ajax
         function delUser(cateid){
            $.get('{{url('home/answer/')}}/'+cateid,{},function(data){
                //页面层
                layer.open({
                    type: 1,
                    title:"回复列表",
                    skin: 'layui-layer-rim', //加上边框
                    area: ['620px', '340px'], //宽高
                    content: data
                });
            });


        }
		
			
</script>

@endsection