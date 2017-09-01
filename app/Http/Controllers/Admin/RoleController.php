<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleInsertRequest;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Input;
use DB;

class RoleController extends Controller
{
    public function auth()
    {
        $input = Input::all();
       
        $role_id = $input['role_id'];
        $pers_id = $input['permission_id'];

        //删除当前已拥有的授权
        $re =  DB::table('permission_role')->where('role_id',$role_id )->delete();
        if(!$re){
            back()->with('errors','授权失败，请重新授权');
        }

        //向permission_role数据库里添加
        foreach ($pers_id as $v) {
            DB::table('permission_role')->insert(
                ['role_id' => $role_id, 'permission_id' => $v]
            );
        }
        return redirect('admin/role');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //调用role模型
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $request = $request -> all();
        $role = role::where('name','like','%'.$search.'%')->paginate($count);
        return view('admin.role.index',['role'=>$role,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add',['title'=>'角色添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleInsertRequest $request)
    {
        $data = $request -> all();
        // 处理插入
        $role = new Role;
        $role->name = $data['name'];
        $role->description = $data['description'];

        if($role->save()){
            return redirect('/admin/role')->with('success','添加成功');
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
        //获取当前的角色
        $role = Role::find($id);
        //获取到所有的权限
        $per = Permission::get();

        $own_pers=  DB::table('permission_role')->where('role_id',$id)->lists('permission_id');
        
        return view('admin.role.auth',['role'=>$role,'per'=>$per,'own_pers'=>$own_pers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::find($id);
        return view('admin.role.edit',['title'=>'角色修改','data'=>$data]);
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
        $data = $request ->all();
        // 获取原数据库信息
        $data2 = Role::find($id);
        // 处理修改
        $data2->name = $data['name'];
        $data2->description = $data['description'];


        if($data2->save())
        {
            return redirect('/admin/role')->with('success','修改成功');
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
        $re =  Role::find($id)->delete();
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
