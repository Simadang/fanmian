<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Http\Requests\PerInsertRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $request = $request -> all();
        $permission = permission::where('name','like','%'.$search.'%')->paginate($count);
        return view('admin.permission.index',['permission'=>$permission,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.add',['title'=>'权限添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerInsertRequest $request)
    {
        $data = $request -> all();
        // 处理插入
        $permission = new Permission;
        $permission->name = $data['name'];
        $permission->description = $data['description'];

        if($permission->save()){
            return redirect('/admin/permission')->with('success','添加成功');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Permission::find($id);
        return view('admin.permission.edit',['title'=>'权限修改','data'=>$data]);
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
        $data2 = permission::find($id);
        // 处理修改
        $data2->name = $data['name'];
        $data2->description = $data['description'];


        if($data2->save())
        {
            return redirect('/admin/permission')->with('success','修改成功');
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
        $re =  Permission::find($id)->delete();
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