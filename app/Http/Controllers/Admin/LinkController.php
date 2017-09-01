<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkInsertRequest;
use App\Models\sad_link;

class LinkController extends Controller
{
    /**
     * 显示所有的友情链接
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',3);
        $search = $request -> input('search','');
        $request = $request -> all();
        // $data = Sad_link::where('title','like','%'.$search.'%')->paginate($count);
        
        $data = Sad_link::where('title','like','%'.$search.'%')->paginate($count);
        // dd($data);
       
        return view('admin.link.show',['data'=>$data,'request'=>$request]);

    }

    /**
     * 跳转至添加友情链接.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create',['title'=>'添加友情链接']);
    }

    /**
     * 添加友情链接.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LinkInsertRequest $request)
    {
        // dd($request);
        // 获取所有信息
        $data = $request ->all();

        // 处理插入
        $link = new Sad_link;
        $link->title = $data['title'];
        $link->url = $data['url'];
        $link->status = $data['status'];

        // $user->remember_token = str_random(50); //str_random 随机字符串
       
        if($link->save())
        {
            return redirect('/admin/link')->with('success','添加成功');
        }else{
            return back()->with('error','失败');
        }

    }

    /**
     * 跳转到编辑友情链接.
     *
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $data = Sad_link::find($id);
        return view('admin.link.edit',['title'=>"用户修改",'data'=>$data]);

    }

    /**
     * 修改友情链接.
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // 获取所有信息
        $data = $request ->all();
        // 获取原数据库信息
        $data2 = Sad_link::find($id);
        // 处理修改
        $data2->title = $data['title'];
        $data2->url = $data['url'];
        $data2->status = $data['status'];

        if($data2->save())
        {
            return redirect('/admin/link')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

    /**
     * 删除友情链接.
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
        $re =  Sad_link::find($id)->delete();
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
