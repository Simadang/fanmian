@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>网站公告管理</span>
    </div>
    <div class="search_wrap">
        <form action="{{url('admin/notice')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th width="70">公告标题:</th>
                    <td><input type="text" name="keyword" value="{{$keyword}}" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                 	<th>公告名</th>
                 	<th>创建时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $v)
                <tr align="center">
                    <td>{{$v['id']}}</td>
                    <td>{{$v['title']}}</td> 
                    <td>{{$v['ctime']}}</td>                
                    <td>{{$v['state'] == 1 ? "【开启】" : "【关闭】"}}</td>
                    <td align="center">
                    	 <span class="btn-group">
                                 
                                <a href="javascript:void(0)" class="btn btn-small" onclick="delNotice({{$v['id']}})" title="删除公告"><i class="icon-trash"></i></a>
                                <a href="javascript:;" class="btn btn-small" onclick="showNotice({{$v['id']}})" title="查看详情" ><i class="icon-eye-open"></i></a>
                                <a href="javascript:;" class="btn btn-small" onclick="updateNotice({{$v['id']}})" title="修改状态"><i class="icon-tools"></i></a>
                                
                            </span>
                            <!-- '{{url('admin/notice/')}}/'+noticeid -->
                    	<!-- 　<a href="{{ url('admin/slide/create') }}">添加</a> -->
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="dataTables_info"  id="page_page">
            {!! $data->appends(['keyword'=>$keyword])->render() !!}
        </div>
    </div>
</div>

<script>
    // 通过弹窗进行网站公告的删除
        function delNotice(noticeid){

            layer.confirm('是否确认删除？', {
                btn: ['确认','取消']        //按钮
            }, function(){
               
                $.post('{{url('admin/notice/')}}/'+noticeid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                    // console.log(data);
                   // 删除成功
                    if(data.status == 1){

                        layer.msg(data.msg, {icon: 6});
                        location.href = location.href;
                    }else if(data.status == 0){

                        layer.msg(data.msg, {icon: 5});
                        location.href = location.href;
                    }
                });

            }, function(){

            });

        }

    // 通过弹窗进行网站公告状态的修改
        function updateNotice(noticeid){

            layer.confirm('是否修改状态？', {
                btn: ['确认','取消']        //按钮
            }, function(){
               
                $.post('{{url('admin/notice/')}}/'+noticeid,{'_token':'{{csrf_token()}}','_method':'PUT'},function(data){
                    // console.log(data);
                   // 修改成功
                    if(data.status == 1){

                        layer.msg(data.msg, {icon: 6});
                        location.href = location.href;
                    }else if(data.status == 0){

                        layer.msg(data.msg, {icon: 5});
                        location.href = location.href;
                    }
                });

            }, function(){

            });

        }

        // 弹窗显示网站公告内容
        function showNotice(noticeid){

            $.get('{{url('admin/notice')}}/'+noticeid,{},function(data){
                //页面层
                layer.open({
                    type: 1,
                    title:'公告内容',
                    skin: 'layui-layer-rim', //加上边框
                    area: ['620px', '340px'], //宽高
                    content: data
                });
            });
        }
           
</script>

@endsection