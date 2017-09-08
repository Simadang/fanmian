<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_goods;
use App\Models\sad_home_user;
use App\Models\sad_type;

class GoodsController extends Controller
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
        
        // 获取商品列表的值
        $data = Sad_goods::where('title','like','%'.$search.'%')->paginate($count);

       
        //将商品列表中的uid替换为卖家姓名
        foreach($data as $k=>$v)
        {
<<<<<<< HEAD
            // $info =  Sad_goods::find($v['id'])->sad_home_user->username;
            // $data[$k]['uid'] = $info;
=======
            $info =  sad_goods::find($v['id'])->home_user->username;
            // dd($info);

            $data[$k]['uid'] = $info;
>>>>>>> b3492246aeb21fbfa401a15e1f68966ce19f3daf
        }
        
        //将商品列表中的tid替换为商品所属板块
        foreach($data as $k=>$v)
        {
            
            // $info =  Sad_goods::find($v['id'])->sad_type->name;
            // $data[$k]['tid'] = $info;

            //将商品列表中的condition值更改输出
            $c = '';
            switch ($v['condition']) {
                case '0':
                    $c = '九九新';
                    break;
                case '1':
                
                    $c = '九成新';
                    break;
                case '2':
                    $c = '八成新';
                    break;
                case '3':
                    $c = '七成新';
                    break;
                
                case '4':
                    $c = '垃圾成色';
                    break;
                default: 

                    break;
            }
            $data[$k]['condition'] = $c;
            
        }



        return view('admin.goods.show',['data'=>$data,'request'=>$request]);

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
     * 删除商品.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $link = Sad_link::find($id);
        // if($link->delete()){
        //     return redirect('/admin/link')->with('success','删除成功');
        // }else{
        //     return back()->with('error','失败');
        // }
        $data = [];
        $re =  Sad_goods::find($id)->delete();
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
