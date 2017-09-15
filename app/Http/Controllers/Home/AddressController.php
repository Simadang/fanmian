<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = session('user');
        // dd($user);
        $id = $user['id'];
        // dd($id);

        $address = DB::table('useraddress')->where('uid', $id)->get();
        // dd($address);
        //加载地址页面
        return view('home.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       echo "create test";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        $data = $request->except('_token');
        // dd($data);

        //给信息加规则,验证
         $rule = [
            'name'=>'required|between:2,12',
            'phone'=>'required|regex:/^1[3578]\d{9}$/',
            'address'=>'required|between:6,300'
        ];

        $mess = [
            'name.required'=>'用户名必须输入',
            'name.between'=>'用户名的长度在2-12位之间',
            'password.regex'=>'手机号格式不对',
            'phone.required'=>'手机号不能为空',
            'address.required'=>'地址不能为空',
            'address.between'=>'地址需在6到300之间'
        ];
        $validator = Validator::make($data, $rule,$mess);  
        //        如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }    

 
        //写入数据库
 
        $user = session('user');
        // dd($user);
        $id = $user['id'];
        // dd($id);
        $data['uid'] = $id;

        // 判断用户是否有默认地址
        $add = DB::table('useraddress')->where('uid', $id)->get();

        // 若有地址,则添加的地址为非默认地址
        if($add){
            $data['status'] = 1;
        };

        
        $res = DB::table('useraddress')->insert($data);

        if($res){
            return redirect('/address');
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
        echo "show test".$id;
    }

    /**
     * 跳转到编辑地址页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = session('user');
        // dd($user);
        $id1 = $user['id'];
        // dd($id);

        $address    = DB::table('useraddress')->where('uid', $id1)->get();
        // dd($address);
        $model      = DB::table('useraddress')->find($id);
        // dd($model);
        //加载地址编辑页面
        return view('home.address.edit', compact('address', 'model'));
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
        //获取数据
        $data = $request ->except('_token');

        //删除隐藏域及其值
        unset($data['_method']);

        $data['id'] = $id;

        // dd($data);
        //给信息加规则,验证
         $rule = [
            'name'=>'required|between:2,12',
            'phone'=>'required|regex:/^1[3578]\d{9}$/',
            'address'=>'required|between:6,300'
        ];

        $mess = [
            'name.required'=>'用户名必须输入',
            'name.between'=>'用户名的长度在2-12位之间',
            'password.regex'=>'手机号格式不对',
            'phone.required'=>'手机号不能为空',
            'address.required'=>'地址不能为空',
            'address.between'=>'地址需在6到300之间'
        ];
        $validator = Validator::make($data, $rule,$mess);  
        //        如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }    

 
        //写入数据库

        $res = DB::table('useraddress')->where('id', $id)->update($data);

        if($res){
            return redirect('/address');
        }else{
            return back()->with('errors','添加失败');
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
        echo "destroy test";
    }


    public function getDel($id){
        //执行删除地址的动作
        
        // 判断删除的是否为默认地址
        $data = DB::table('useraddress')->where('id', $id)->get();

            $res = DB::table('useraddress')->where('id', $id)->delete();

            if($res){
                return redirect('address');
            }else{
                return back()->with('errors','删除失败');
            }

        
    }

    /**
     * 更改默认地址
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        
        $data = $request->except('_token');

        $address = DB::table('useraddress')->where('id',$data['id'])->get();


        return $address;
    }


}
