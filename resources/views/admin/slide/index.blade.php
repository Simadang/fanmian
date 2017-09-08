@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>轮播图管理</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                 	<th>图片名</th>
                 	<th>url</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
                <tr>
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['pic'] }}</td> 
                    <td>{{ $v['url'] }}</td>                

                    <td align="center">
                    	 <span class="btn-group">
                                 
                                <a href="javascript:void(0)" class="btn btn-small" onclick="delLink({{ $v['id'] }})"><i class="icon-trash"></i></a>
                                <a href="{{ url('admin/slide/create') }}" class="btn btn-small"><i class="icol-add"></i></a>
                                
                            </span>
                    	<!-- 　<a href="{{ url('admin/slide/create') }}">添加</a> -->
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    // 通过弹窗进行友情链接的删除
      function delLink(linkid){

            layer.confirm('是否确认删除？', {
                btn: ['确认','取消']        //按钮
            }, function(){
               
                $.post('{{url('admin/slide/')}}/'+linkid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                    console.log(data);
                   // 删除成功
                    if(data.status == 0){
                        layer.msg(data.msg, {icon: 5});
                        location.href = location.href;
                    }else{
                        layer.msg(data.msg, {icon: 6});
                        location.href = location.href;
                    }
                });

            }, function(){

            });

        }
           
</script>

@endsection