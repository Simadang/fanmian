<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_type;
use App\Models\sad_goods;
use App\Models\sad_goods_pic;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //获取所有分类下的商品
        // 页面上端搜索
        $search = $request -> input('search','');
        $request = $request -> all();
        $goods1 = sad_goods::where('title','like','%'.$search.'%')->get();

        // 将二维数组变为三维数组进行遍历,与show方法对应
        $goods = [];
        $goods[] = $goods1;
        // dd($goods);


        
        $data = sad_type::all();
        $data2 = [];
        $data3 = [];
        $data4 = [];
        foreach($data as $k=>$v)
        {
            // 统计一个字符串在另一个字符串出现次数

            $len = substr_count($v['path'],',');
            if($v['pid']==0)
            {
                $data2[] = $v;

            }
            
            foreach($data2 as $kk=>$vv)
            {
                // var_dump($v['id']);
                if($v['pid']==$vv['id'])
                {
                    $data3[] = $v;
                }
            }

            foreach($data3 as $kkk=>$vvv)
            {
                // var_dump($v['id']);
                if($v['pid']==$vvv['id'])
                {
                    $data4[] = $v;
                }
            }

            foreach($data4 as $kkkk=>$vvvv)
            {
                // var_dump($v['id']);
                if($v['pid']==$vvvv['id'])
                {
                    $data4[] = $v;
                }
            }
        }
        
        //分类结束


        return view('home.search.index',['data2'=>$data2,'data3'=>$data3,'data4'=>$data4,'goods'=>$goods,'request'=>$request]);
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
        static $i='';
        static $goods = [];
        //获取分类下的子类
        $data = sad_type::where('pid',$id)->select('id')->get(); 

        //判断是否获取到
        if($data->first()){
            $i++;
            foreach($data as $k => $v){
                $this->show($v['id']);
                
            }
        }else{
            //获取所有分类下的商品

            // $info = sad_order::join('home_user','order.uid','=','home_user.id')->get();

            // $goods = sad_goods::join('goods_pic','goods.pic','=','goods_pic.id')->where('tid',$id)->get();

            // $text = sad_goods::join('goods_pic','goods.pic','=','goods_pic.id')->get();



            $goods[] = sad_goods::where('tid',$id)->get();




            // foreach($goods as $k=>$v)
            // {
            //      $info =  sad_goods::find($v['id'])->home_user->username;

            //     // dump($v);
            // }



            // $sad_good['img'] = sad_goods_pic::where('id',$sad_good['pic'])->get();

            // $goods[] = $sad_good;



        }

        // dd($goods);


        // 将分类遍历到搜索面中
        $data = sad_type::all();
        $data2 = [];
        $data3 = [];
        $data4 = [];
       
        foreach($data as $k=>$v)
        {
            // 统计一个字符串在另一个字符串出现次数

            $len = substr_count($v['path'],',');
            if($v['pid']==0)
            {
                $data2[] = $v;

            }
            
            foreach($data2 as $kk=>$vv)
            {
                // var_dump($v['id']);
                if($v['pid']==$vv['id'])
                {
                    $data3[] = $v;
                }
            }

            foreach($data3 as $kkk=>$vvv)
            {
                // var_dump($v['id']);
                if($v['pid']==$vvv['id'])
                {
                    $data4[] = $v;
                }
            }

            foreach($data4 as $kkkk=>$vvvv)
            {
                // var_dump($v['id']);
                if($v['pid']==$vvvv['id'])
                {
                    $data4[] = $v;
                }
            }

        }
        //分类结束
        return view('home.search.index',compact('goods','i','data2','data3','data4'));     
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
