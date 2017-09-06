<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * 用户个人中心主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        


        return view('home.user.index');
    }
    /*
    *
    *个人资料页面
    *
    */
    public function detail()
    {
        return view('home.user.detail');
    }
    /*
    *
    *用户安全设置页面
    *
    */
    public function idcard()
    {
        return view('home.user.idcard');
    }
     /*
    *
    *手机验证的页面
    *
    */
     public function bindphone()
     {
        return view('home.user.bindphone');
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
