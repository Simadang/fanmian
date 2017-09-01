<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Hash;
use App\Models\sad_admin_user;

class PassController extends Controller
{
    /**
     * 加载用户修改密码的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pass.index');
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dopass(Request $request)
    {
        //1.获取用户提交的数据
        $request = $request ->except('_token');
        //2.密码验证规则
          $rule = [
            'oldpassword'=>'required|between:5,12',
            'password'=>'required|between:6,18',
            'repassword'=>'required|same:password'
        ];

        $mess = [
            'oldpassword.required'=>'原密码必须输入',
            'oldpassword.between'=>'原密码的长度在5-12位之间',
            'password.required'=>'新密码必须输入',
            'password.between'=>'新密码的长度在6-18位之间',
            'repassword.required'=>'确认密码必须输入',
            'repassword.same'=>'确认密码跟新新密码必须一致',
        ];

        $validator = Validator::make($request, $rule,$mess);
//        如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
         // 3 修改密码

       $user =  sad_admin_user::find(session('user')->id);
        $user->password = Hash::make($request['password']);
       $re =  $user->save();
       if($re){
           return back()->with('errors','修改成功');
       }else{
           return back()->with('errors','修改失败');
       }

    }

}
