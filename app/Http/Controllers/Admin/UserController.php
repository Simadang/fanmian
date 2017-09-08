<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserInsertRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //调用user模型
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $request = $request -> all();
        $user = User::where('username','like','%'.$search.'%')->paginate($count);
        return view('admin.user.index',['user'=>$user,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(UserInsertRequest $request)
    {
        $data = $request -> all();
        // dd($data);
        // 处理插入
        $user = new User;
        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->authority = $data['authority'];

        if($user->save()){
            return redirect('/admin/user')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        $data = User::find($id);
        return view('admin.user.edit',['title'=>'用户修改','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        // 获取所有信息
        $data = $request ->all();
        // 获取原数据库信息
        $data2 = User::find($id);
        // 处理修改
        $data2->username = $data['username'];
        $data2->phone = $data['phone'];
        $data2->email = $data['email'];
        $data2->authority = $data['authority'];


        if($data2->save())
        {
            return redirect('/admin/user')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
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
        $re =  User::find($id)->delete();
        if($re){
            // $data['status']= 0;
            $data['msg']='删除成功';
        }else{
           // $data['status']= 1;
           $data['msg']='删除失败';
        }
        return $data;
   }
}
