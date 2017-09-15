<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword','');
        
        //获取所有公告
        $data = DB::table('notice')->where('title','like','%'.$keyword.'%')->orderBy('id','desc')->paginate(5);

        return view('admin.notice.index',['data'=>$data,'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Input::except('_token');

        $arr['title'] = $data['title'];
        $arr['ctime'] = date('Y-m-d H:i:s',time());
        $arr['content'] = $data['art_content'];

        $res = DB::table('notice')->insert($arr);

        if($res){

            return redirect('admin/notice');
        }else{

            return back()->with('errors','添加失败');
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
        $data = DB::table('notice')->where('id',$id)->first();

        return view('admin.notice.content',['data'=>$data]);
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
        //查找要修改的数据
        $data = DB::table('notice')->where('id',$id)->first();

        //修改指定公告状态
        if($data['state'] == 0){

            $res = DB::table('notice')->where('id',$id)->update(['state'=>1]);
        }else if($data['state'] == 1){

            $res = DB::table('notice')->where('id',$id)->update(['state'=>0]);
        }

        //判断是否修改成功
        if($res){

            $arr=[
                'status'=>1,
                'msg'=>'修改成功'
            ];
        }else{

            $arr=[
                'status'=>0,
                'msg'=>'修改失败'
            ];
        }

        return $arr;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //找到删除的记录
        $res = DB::table('notice')->where('id',$id)->delete();

        //判断是否删除成功
        if($res){

            $data=[
                'status'=>1,
                'msg'=>'删除成功'
            ];
        }else{

            $data=[
                'status'=>0,
                'msg'=>'删除失败'
            ];
        }

        return $data;
    }
}
