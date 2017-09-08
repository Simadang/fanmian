<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_order;
use App\Models\sad_home_user;
use App\Models\sad_goods;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',3);
        $search = $request -> input('search','');
        $request = $request -> all();

        // 获取订单列表详情
        $data = sad_order::where('temp','like','%'.$search.'%')->paginate($count);



        // $info = sad_order::join('home_user','order.uid','=','home_user.id')->get();
        

        // Tag::where('tag_name','like','%'.$keys.'%')->join('zy_category','zy_tag.cid','=','zy_category.id')->orderBy('tag_id','asc')->paginate($count);

        return view('admin.order.show',['data'=>$data,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 1 查询此id下买家信息
       
        $b = DB::table('order') ->find($id);

        $str ='<table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                <tr>
                    <th>买家昵称</th>
                    <th>收件人姓名</th>
                    <th>收件人地址</th>
                    <th>收件人电话</th>
                </tr>';

        
            $str.= "<tr>
                    <td class='tc''>{$b['uid']}</td>
                    <td class='tc'>{$b['name']}</td>
                    <td class='tc'>{$b['address']}</td>
                    <td class='tc'>{$b['tel']}</td>
                    </tr>";

            $str.= '</table>';
            return $str;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = [];
        $re =  Sad_order::find($id)->delete();
        if($re){
            $data['status']= 0;
            $data['msg']='删除成功';
        }else{
           $data['status']= 1;
           $data['msg']='删除失败';
        }
        return $data;
    }
}
