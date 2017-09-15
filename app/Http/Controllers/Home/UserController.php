<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\sad_home_user;
use App\Models\sad_userinfo;
use App\Models\sad_collection;
use App\Models\sad_goods;

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
        // dd($user);
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
        
    
        // 收藏
        $collection = sad_collection::all();
        
        // 收藏
        $goods = sad_goods::all();

        return view('home.user.center',compact('collection','goods'));
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

      /*
    *
    *我的闲置页面
    *
    */
     public function getSell()
     {
        
        //获取登录用户的信息
        $user = session('user');
        // dd($user);
        //通过用户的id 获取该用户发布的信息
        $goods = DB::table('goods')->where('uid',$user['id'])->get();
         //通过订单的id ,获取订单中的商品的信息
            
        // dd($goods);
           
            //查询该用户的订单以及订单中商品所有的数据
             $arr = DB::table('order') ->join('goods','order.gid','=','goods.id') ->get();
        // dd($arr);


        //通过订单的状态来分配订单的具体位置
       // 未发货status=0
       // 待付款status=1
       // 待收货status=2
       // 待评价status=3
       
        $daifukuan = DB::table('order')->where('uid',$user['id'])->where('status','0')->get();
       // dd($daifukuan);
        $weifahuo = DB::table('order')->where('uid',$user['id'])->where('status','1')->get();
       
        $yifahuo = DB::table('order')->where('uid',$user['id'])->where('status','2')->get();
        $daipingjia = DB::table('order')->where('uid',$user['id'])->where('status','3')->get();

      
            $goods1 = DB::table('goods')->where('id',$daifukuan[0]['gid'])->get();
          
            $goods2 = DB::table('goods')->where('id',$weifahuo[0]['gid'])->get();
        
            $goods3 = DB::table('goods')->where('id',$yifahuo[0]['gid'])->get();
       
            $goods4 = DB::table('goods')->where('id',$daipingjia[0]['gid'])->get();
        

       

        // dd($goods);
        return view('home.order.index',compact('arr','daifukuan','goods1','weifahuo','goods2','goods3','yifahuo','goods4','daipingjia'));
        

        return view('home.pay.sell',compact('collection','goods'));
     }
   
}
