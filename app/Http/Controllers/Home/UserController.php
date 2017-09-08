<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\sad_home_user;
use App\Models\sad_userinfo;

use DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * 用户个人中心主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        


        return view('home.layout.left');
    }
    /*
    *
    *个人信息页面
    *
    */
    public function getDetail()
    {
        //在登陆的用户id中取出该用户的详细信息
        $user = session('user');
        //dd($user);
        //获取用户详情表的数据
        $info = sad_userinfo::where('uid',$user['id'])->get();
        // dd($info);
       
        return view('home.user.detail',compact('user','info'));
    }
    /*
    *
    *用户修改个人信息的执行动作
    *
    */
    public function postUpdate(Request $request)
    {
       

        //获取用户要修改的数据
        $user = session('user');
            // dd($user);
            //  $home_user = sad_home_user::find($user['id']);
            //   $userinfo = sad_userinfo::where('uid',$user['id'])->get();
            // dd($home_user);
        $request = $request ->input();
        // dd($request);
        //2.验证表单规则
          $rule = [
            'nickname'=>'required|between:2,12',
            'username'=>'required|between:2,12',
            'phone'=>'required|regex:/^1[3578]\d{9}$/',
            'birthday'=>'required|regex:/^\d{4}-\d{2}-\d{2}$/',
            'email'=>'required|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/'
            
        ];

        $mess = [
            'nickname.required'=>'昵称必须输入',
            'username.required'=>'用户名必须输入',
            'username.between'=>'用户名的长度在2-12位之间',
            'nickname.between'=>'昵称的长度在2-12位之间',
            'phone.regex'=>'手机号格式不对',
            'email.regex'=>'邮箱格式不对',
            'birthday.regex'=>'生日格式不对',
            'phone.required'=>'手机号不能为空',
            'email.required'=>'邮箱不能为空',
            'birthday.required'=>'生日不能为空'
            
        ];
        $validator = Validator::make($request, $rule,$mess);  
        //        如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        } 
        //执行修改的动作
          
            $home_user = sad_home_user::find($user['id']);
              $userinfo = sad_userinfo::where('uid',$user['id'])->get();

            // $home_user = new sad_home_user;
            $home_user ->username = $request['username'];
            $home_user ->phone = $request['phone'];
            $home_user ->email = $request['email'];
            $res1 = $home_user ->save();
            //分别把数据修改到两张表中
             // $userinfo = new sad_userinfo;
            $userinfo[0] ->sex = $request['sex'];
            $userinfo[0] ->nickname = $request['nickname'];
            $userinfo[0] ->birthday = $request['birthday'];
            $res2 = $userinfo[0] ->save();

            if($res1 && $res2){
                return redirect('user/detail');
            }else{
                return back()->with('errors','修改失败');
            }

    }
     /*
    *
    *手机验证的页面
    *
    */
     public function getCenter()
     {
        return view('home.user.center');
     }
     /*
     *
     *绑定邮箱页面
     *
     */
     public function email()
     {
        return view('home.user.email');
     }
    /*
    *
    *用户密码修改页面
    *
    *
    */
    public function password()
    {
        return view('home.user.password');
    }

    /*
    *
    *收货地址页面
    *
    */
    public function address()
    {
        return view('home.user.address');
    }
    /*
    *
    *订单管理页面
    *
    */
    public function order()
    {
        return view('home.user.order');
    }
   
}
