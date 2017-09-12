<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\sad_order;



class OrderController extends Controller
{
    /**
     * 加载订单中心的主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //获取登录用户的信息
        $user = session('user');
        // dd($user);
        //通过用户的id 获取该用户的订单信息
        $order = DB::table('order')->where('uid',$user['id'])->get();
         //通过订单的id ,获取订单中的商品的信息
            
            
           
            //查询该用户的订单以及订单中商品所有的数据
             $arr = DB::table('order') ->join('goods','order.gid','=','goods.id') ->get();
        // dd($arr);


        //通过订单的状态来分配订单的具体位置
       
       
        $daifukuan = DB::table('order')->where('uid',$user['id'])->where('status','未发货')->get();
       // dd($daifukuan);
        $weifahuo = DB::table('order')->where('uid',$user['id'])->where('status','待付款')->get();
       
        $yifahuo = DB::table('order')->where('uid',$user['id'])->where('status','待收货')->get();
        $daipingjia = DB::table('order')->where('uid',$user['id'])->where('status','待评价')->get();

      
            $goods1 = DB::table('goods')->where('id',$daifukuan[0]['gid'])->get();
          
            $goods2 = DB::table('goods')->where('id',$weifahuo[0]['gid'])->get();
        
            $goods3 = DB::table('goods')->where('id',$yifahuo[0]['gid'])->get();
       
            $goods4 = DB::table('goods')->where('id',$daipingjia[0]['gid'])->get();
        

       

        // dd($goods);
        return view('home.order.index',compact('arr','daifukuan','goods1','weifahuo','goods2','goods3','yifahuo','goods4','daipingjia'));
    }

    /**
     * 加载订单详情页
     *
     * @return \Illuminate\Http\Response
     */
    // public function getOrderinfo()
    // {
    //     return view('home.order.orderinfo');
    // }

    /**
     * 执行订单删除动作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStatus(Request $request)
    {
        //获取带订单的状态
        $status = $_GET['status'];
        // dd($status);
        //通过订单号查询该订单的所有信息
        $order = sad_order::where('status',$status)->get();
        // dd($order);
        //判断订单的状态,然后判断该订单是否可以删除
        foreach($order as $k=>$v){
                //判断
            if($v['status'] == '待收货'){
                
                //并添加到数据库中保存
                //先查询
                $ord = new sad_order;
                $res = $ord ->find($v['id']);
                //修改状态码,当状态码为4 的时候,代表已经收货成功,跳到主页,把订单放入到评价区域
                $res -> status = '待评价';
                $result = $res ->save();
                if($result){
                     return redirect('order/index');
                }else{
                    return back()->with('errors','确认收货失败');
                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
