@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8 mws-collapsible">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 网站配置管理</span>
    <div class="mws-collapse-button mws-inset"></div></div>
    <div class="mws-panel-inner-wrap"><div class="mws-panel-body no-padding">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_0_length" class="dataTables_length"><label>
        <table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
            <thead>
                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending"  style="width: 45px;">排序</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 45px;">ID</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">标题</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">名称</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 320px;">内容</th>
                <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 102px;">操作</th></tr>
            </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($data as $k=>$v)
            <tr class="even" style='text-align: center;'>
                <td class="  sorting_1">{{$v['order']}}</td>
                <td class=" ">{{$v['id']}}</td>
                <td class=" ">{{$v['title']}}</td>
                <td class=" ">{{$v['name']}}</td>
                <td class=" ">{!!$v['content']!!}</td>
                <td class=" ">
                    <span class="btn-group">
                        <a href="/admin/config/{{$v->id}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-small" onclick="delConf({{ $v['id'] }})"><i class="icon-trash"></i></a>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div></div></div></div>

<script>
    // 通过弹窗进行友情链接的删除
      function delConf(id){

            layer.confirm('是否确认删除？', {
                btn: ['确认','取消']        //按钮
            }, function(){
               
                $.post('{{url('admin/config/')}}/'+id,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                    // console.log(data);
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