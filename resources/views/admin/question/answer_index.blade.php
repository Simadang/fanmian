@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>鱼塘回复条管理</span>
    </div>
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
				<br><br>
            　			<ul>
			            	<li style="float:left;life-style:none">ID:　　　{{ $data[0]['id'] }}</li>
			            	<li style="float:left;life-style:none">板块编号:　　　{{ $data[0]['tid'] }}</li>
			            	<li style="float:left;life-style:none">鱼塘问题编号:　　　{{ $data[0]['qid'] }}</li>
			            </ul>
        <table class="mws-table">　
            <thead>
                <tr>
                   
                    <th>回答用户的id</th>
               		<th>用户回复答案</th>
               		<th>回复时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
                <tr>
                  
                   <td>{{ $v['uid'] }}</td>
                   <td>{{ $v['content'] }}</td>
                   <td>{{ date('Y-m-d H:i:s') }}</td>

                    <td align="center">
                    	 <a href="{{ url('admin/question/delete/'.$v['id']) }}">删除</a>
                    	<a href="{{ url('admin/question/reply/'.$v['qid']) }}">回复</a>　
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection