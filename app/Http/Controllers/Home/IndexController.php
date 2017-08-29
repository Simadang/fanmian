<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
   /*
   *
   *在主页面分配商品分类的数据
   *
   */
     public function typePid($pid = 0)
    {

        //

         $data = DB::table('type')->where('pid',$pid)->get();
         // dd($data);
        $arr = [];
        foreach ($data as $key => $value) {
            
            $value['sub'] = self::typePid($value['id']);
            $arr[] = $value;
        }
        return $arr;
    }

   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home.index.index',['data'=>self::typePid(),'data1'=>self::lun()]);
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
     * 前台使用分类模板
     */
    public function show()
    {
        return view('home.index.index',['data'=>self::typePid()]);
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

    /*
    *
    *前台轮播图路由
    *
    */
     static public function lun()
    {       

        //获取轮播图的数据
            $data1 = DB::table('slide')->get();
            // dd($data);
        return $data1;
    }
}
