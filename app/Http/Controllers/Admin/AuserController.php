<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuserInsertRequest;
use App\Models\Auser;
use App\Models\Role;
use Hash;
use Illuminate\Support\Facades\Input;
use DB;

class AuserController extends Controller
{
    public function auth()
    {
//       1 接收传过来的角色、要赋予的权限数据
        $input = Input::all();

//         角色ID
        $user_id = $input['user_id'];
        $role_id = $input['role_id'];

//        删除当期角色已经有的权限
        $re =  DB::table('role_user')->where('user_id',$user_id )->delete();
        if(!$re){
            back()->with('errors','授权失败，请重新授权');
        }

//       2 授权（向permission_role表中写记录）
        foreach ($role_id as $v) {
            \DB::table('role_user')->insert(
                ['user_id' => $user_id, 'role_id' => $v]
            );
        }
        return redirect('admin/auser');
    }
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
        $user = Auser::where('username','like','%'.$search.'%')->paginate($count);
        return view('admin.auser.index',['user'=>$user,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auser.add',['title'=>'后台用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuserInsertRequest $request)
    {
        $data = $request -> all();
        // dd($data);
        // 处理插入
        $auser = new Auser;
        $auser->username = $data['username'];
        $auser->password = Hash::make($data['password']);
        $auser->status = $data['status'];

        if($auser->save()){
            return redirect('/admin/auser')->with('success','添加成功');
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
        //1 获取到当前用户
        $user =   Auser::find($id);
//        2 获取到所有的角色
        $roles = Role::get();
//        获取当前用户已经被授予的角色
        $own_roles=  \DB::table('role_user')->where('user_id',$id)->lists('role_id');
        //dd($own_pers);
//        3 将相关的数据（用户、角色）返回给授权页面
        return view('admin.auser.auth',compact('user','roles','own_roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Auser::find($id);
        return view('admin.auser.edit',['title'=>'用户修改','data'=>$data]);
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
        // 获取所有信息
        $data = $request ->all();
        // 获取原数据库信息
        $data2 = Auser::find($id);
        // 处理修改
        $data2->username = $data['username'];
        $data2->status = $data['status'];


        if($data2->save())
        {
            return redirect('/admin/auser')->with('success','修改成功');
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
        $re =  Auser::find($id)->delete();
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
