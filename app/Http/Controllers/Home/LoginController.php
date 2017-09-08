<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Crypt;

class LoginController extends Controller
{
    /**
     * 加载登录页面
     */
    public function getIndex()
    {
        return view('home.login.index');
    }

    /**
     * 执行登录动作
     */
    public function postDologin(Request $request)
    {
        //获取登录表单数据
        $input = Input::except('_token');

        //判断邮箱\手机号登陆 <--可用orwhere子句直接进行区分登录
        if(preg_match("/^1[3|4|5|7|8|9]\d{9}$/", $input['username'])){

            $user = DB::table('home_user')->where('phone',$input['username'])->first();

            //验证\手机\密码是否输入正确   

            if(empty($user)){
                return back()->with('errors','此用户不存在，请先注册');
            }

            if(Crypt::decrypt($user['password']) != trim($input['password'])){

                return back()->with('errors','密码不正确');
            }

            //判断用户是否有登录权限
            if($user['authority'] != 1){


                return back()->with('errors','此用户未激活，请先激活后登录');
            }

            //登录成功将用户信息存入session中
            session(['user'=>$user]);

            return redirect('/');

        }else if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $input['username'])){

            $user = DB::table('home_user')->where('email',$input['username'])->first();

            //验证邮箱\密码是否输入正确   
            if(empty($user)){

                return back()->with('errors','此用户不存在，请先注册');
            }

            if(Crypt::decrypt($user['password']) != trim($input['password'])){

                return back()->with('errors','密码不正确');
            }

            //判断用户是否有登录权限
            if($user['authority'] != 1){


                return back()->with('errors','此用户未激活，请先激活后登录');
            }
            
            //登录成功将用户信息存入session中
            session(['user'=>$user]);

            return redirect('/');
        }else{

            return back()->with('errors','请输入正确的账号名');
        }
    }

    
}
