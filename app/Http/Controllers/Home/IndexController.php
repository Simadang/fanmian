<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\sad_type;
use App\Models\sad_question;
use App\Models\sad_answer;
use App\Models\sad_goods;

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

            }else{

                $data3[] = $v;

            }
            

        }
        //分类结束

        // 将问题遍历到面盆中
        $type = sad_question::join('type','question.tid','=','type.id')->get();

        
        // dd($data2);

        // 遍历商品信息
        $goods = DB::table('goods')->orderBy('id','desc')->get();
        
        // $goods = DB::table('goods')->orderBy('id','desc');
        
        foreach($goods as $k=>$v)
        {
            
            $goods1 = DB::table('type')->where('id',$v['tid'])->select('path')->get();
            // dump($goods1);
             // dump($v);

            foreach($goods1 as $kk=>$vv)
            {
                // dump($vv->path);
                $s = explode(',',$vv['path']);
                // dump($s);
                $ss = DB::table('type')->where('id',$s[1])->select('name')->get();
                // dump($ss[0]['name']);
                // dump($v);
                $goods[$k]['name']=$ss[0]['name'];
                // $v['tid']=$s[1];
                // dump($v);
            }
            
           
        }

        // dd($goods);
        // 将商品信息放入单独数组
        $g = [];
        foreach($data2 as $k=>$v)
        {
           // dump($v);
            foreach($goods as $gk=>$gv)
            {
                // dump($gv);
                if($v['name']==$gv['name'])
                {
                    $g[$v['id']][]=$gv;

                }
                
            }
        }
       


        return view('home.index.index',['data'=>self::typePid(),'data1'=>self::lun(),'data2'=>$data2,'data3'=>$data3,'type'=>$type,'goods'=>$goods,'g'=>$g]);

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
