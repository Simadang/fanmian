<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\sad_type;
use App\Models\sad_question;
use App\Models\sad_answer;

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
        // 将分类遍历到主页面中
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

        }
        //分类结束

        // 将问题遍历到面盆中
        $type = sad_question::get();
        
        // 获取商品列表的值
        $type = sad_question::join('type','question.tid','=','type.id')->get();











        return view('home.index.index',['data'=>self::typePid(),'data1'=>self::lun(),'data2'=>$data2,'data3'=>$data3,'type'=>$type]);

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

     /*
    *
    *加载回复的主页面
    *
    */
    public function answer($id)
    {
        // $data = sad_question::where('uid',5)->get();
        // dd($tt);
        // $id = $request ->only('uid');
        // dd($id);

        // dd($id);
        //获取数据库中的数据,遍历到后台表格中

        $data = sad_answer::where('qid',$id)->get();

        return view('home.question.answer',['data'=>$data]);


    }

    /*回复用户的评论
    *
    *
    */
    public function reply($id)
    {
        dd($id);
        //获取用户的数据问题
        $data = sad_question::find($id);
        $res = $data ->question;
           // dd($res);
        return view('home.question.reply',compact('res'));
    }

}
