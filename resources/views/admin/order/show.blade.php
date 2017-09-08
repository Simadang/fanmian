@extends('admin.layout.index')

@section('content')

<!-- <div class="mws-panel grid_8"> -->

    <div class="mws-panel grid_8 mws-collapsible">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 订单详情</span>
            <div class="mws-collapse-button mws-inset"><span></span>
            </div>
        </div>
    <div class="mws-panel-inner-wrap">
    <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
        <div id="DataTables_Table_0_length" class="dataTables_length">

            <form method='get' action='/admin/order'>
                <label>
                    显示
                    <select name="count" aria-controls="DataTables_Table_0">
                        <option value="10" @if(!empty($request['count']) && $request['count'] == 10) selected @endif>10</option>
                        <option value="20" @if(!empty($request['count']) && $request['count'] == 20) selected @endif>20</option>
                        <option value="30" @if(!empty($request['count']) && $request['count'] == 30) selected @endif>30</option>
                        <option value="40" @if(!empty($request['count']) && $request['count'] == 40) selected @endif>40</option>
                    </select>
                    条
                </label>
        </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    关键字: 
                    <input type="text" name="search" value="{{$request['search'] or ''}}" aria-controls="DataTables_Table_1">
                    <input type="submit" class="btn btn-success btn-xs" value="搜索">
                </label>
            </div>
            </form>
        </div>


    <table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <thead>
            <tr role="row">
                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending"  style="width: 115px;">ID</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >订单号</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >卖家id</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >商品id</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >订单时间</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >总价</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >数量</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >状态</th>
                <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 102px;">操作</th></tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($data as $k=>$v)


               

                <tr class="even" style='text-align: center;'>
                    <td class="  sorting_1">{{$v['id']}}</td>

                    <td class=" ">{{ $v['code'] }}</td>
                    <td class=" ">{{$v['rid']}}</td>
                    <td class=" ">{{$v['gid']}}</td>
                    <td class=" ">{{$v['ordertime']}}</td>
                    <td class=" ">{{$v['cost']}}</td>
                    <td class=" ">{{$v['num']}}</td>
                    <td class=" ">{{$v['status']}}</td>
                    <td class=" ">
                        <span class="btn-group">
                           <!--  <span class="btn-group">
                               <a href="/admin/link/{{$v->id}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>
                            </span> -->

                        <!--     <span class="btn-group">
                                <form method="post" action="/admin/link/{{$v->id}}">
                                {{csrf_field()}}
                                <input type="hidden" value="DELETE" name="_method">
                                <button class="btn btn-small"><i class="icon-trash"></i></button>
                            </form>

                            </span> -->

                            <span class="btn-group">
                                 <a href="javascript:void(0)" class="btn btn-small"  onclick="showBuyer({{ $v['id'] }})" title="查看收件人信息"><i class="icon-map-marker"></i></a>
                                 
                                 <a href="javascript:void(0)" class="btn btn-small" onclick="delOrder({{ $v['id'] }})" title="删除"><i class="icon-trash"></i></a>
                                
                            </span>

                            
                        </span>

                
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        <div class="dataTables_info"  id="page_page">
            {!! $data->render() !!}
        </div>

    </div>
    </div>

    </div>

<script>
    // 通过弹窗进行友情链接的删除
      function delOrder(orderid){

            layer.confirm('是否确认删除？', {
                btn: ['确认','取消']        //按钮
            }, function(){
               
                $.post('{{url('admin/order/')}}/'+orderid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                    // console.log(data);
                   // 删除成功
                    if(data.status == 0){
                        layer.msg(data.msg, {icon: 6});
                        location.href = location.href;
                    }else{
                        layer.msg(data.msg, {icon: 5});
                        location.href = location.href;
                    }
                });

            }, function(){

            });
        }
    

    // 通过弹窗查看买家信息
     function showBuyer(orderid){
        $.get('{{url('admin/order/')}}/'+orderid,{},function(data){
            //页面层
            layer.open({
                type: 1,
                title:"买家信息",
                skin: 'layui-layer-rim', //加上边框
                area: ['820px', '240px'], //宽高
                content: data
            });
        });


    }

</script>

@endsection