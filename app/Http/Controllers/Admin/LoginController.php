<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\sad_admin_user;
use Illuminate\Support\Facades\Validator;
use Hash;




class LoginController extends Controller
{
    /**
     * 加载用户添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {       


        return view('admin.login.add');
    }
    /*
    *
    *加载用户添加的动作执行
    *
    */
    public function dologin(Request $request)
    {
            //获取用户提交的数据
                $request = $request ->except('_token');

//     2 输入的数据是否符合表单验证规范
//       make方法的三个参数
//       参数1 要参与验证的数据
//       参数2 验证规则
//       参数3  设置错误的提示信息

        $rule = [
            'username'=>'required|between:5,12',
            'password'=>'required|between:6,18'
        ];

        $mess = [
            // 'username.required'=>'用户名必须输入',
            'username.between'=>'用户名的长度在5-12位之间',
            // 'password.required'=>'密码必须输入',
            'password.required'=>'密码的长度在6-18位之间'
        ];
        $validator = Validator::make($request, $rule,$mess);  
        //        如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }


           
        //3.判断用户提交的用户名 密码是否正确
         $user = sad_admin_user::where('username',$request['username'])->first();
        if(empty($user)){
            return back()->with('errors','此用户不存在，请先注册');
        }

        // dd(Hash::make($request['password']));
        //验证密码
         if(!Hash::check($request['password'], $user->password)){

            return back()->with('errors','密码不正确');
        }

        //验证验证码
        if($request['code'] != session('code')){
            return back()->with('errors','验证码不正确');
        }
//        如果登录成功，将用户信息保存如session中，表示用户已经登录
        session(['adminuser'=>$user]);
       // Session::put('user',$user);
//      4 如果正确跳转到后台首页 ，如果不正确返回
        return redirect('admin/index');
    }
        /*
        *
        *用户退出登录
        *
        */
        public function logout(Request $request)
        {
            //处理用户退出登录的行为

             session()->flush();
           return redirect('admin/login');

        }

}
