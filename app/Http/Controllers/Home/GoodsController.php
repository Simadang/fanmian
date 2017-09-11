<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_goods;
use App\Models\sad_comment;
use App\Models\User;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //调用Goods
        // 在此只找了id=3;
        $goods = sad_goods::find(3);
        $info = sad_goods::join('goods_pic','goods.pid','=','goods_pic.id')->get();
        $data = sad_comment::all();
        
        foreach($data as $k=>$v)
        {
            $name =  sad_comment::find($v['id'])->comment->username;
            $data[$k]['uid'] = $name;
            // dd($name);
        }

        $num = Sad_comment::join('goods','comment.gid','=','goods.id')->count();

        return view('home.goods.index',['goods'=>$goods,'info'=>$info,'data'=>$data,'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.goods.add');
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
        //调用Goods
        // 在此只找了id=3;
        $goods = sad_goods::find($id);
        $info = sad_goods::join('goods_pic','goods.pid','=','goods_pic.id')->get();
        $data = sad_comment::all();
        
        foreach($data as $k=>$v)
        {
            $name =  sad_comment::find($v['id'])->comment->username;
            $data[$k]['uid'] = $name;
            // dd($name);
        }

        $num = Sad_comment::join('goods','comment.gid','=','goods.id')->count();

        return view('home.goods.index',['goods'=>$goods,'info'=>$info,'data'=>$data,'num'=>$num]);
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
