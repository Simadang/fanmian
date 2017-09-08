<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_home_user;
use Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Crypt;
use DB;

class ForgetController extends Controller
{
    
    /**
     *加载忘记密码首页
     */
    public function getIndex()
    {
        return view('home.forget.index');
    }

    /**
     *处理是否本人后加载重置页面
     */
    public function postVerify(Request $request)
    {
        //表单获取字段
        $input = $request->except('_token');
        // dd($input);
        $username = $request->flashOnly('username');

        //判断邮箱\手机号登陆 <--可用orwhere子句直接进行区分登录
        if(preg_match("/^1[3|4|5|7|8|9]\d{9}$/", $input['username'])){

            $user = DB::table('home_user')->where('phone',$input['username'])->first();

            //验证用户是否存在   

            if(empty($user)){

                return back()->with('errors','此用户不存在，请先注册');
            }

            //判断验证码是否正确
            if($input['verify'] == session('verifyCode')){

                return back()->with('errors','验证码错误');
            }

            //验证身份成功跳转至重置密码页面
            return redirect('home/forget/edit');

        }else if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $input['username'])){

            $user = DB::table('home_user')->where('email',$input['username'])->first();

            //验证用户是否存在   
            if(empty($user)){

                return back()->with('errors','此用户不存在，请先注册');
            }

            //判断验证码是否正确
            if($input['verify'] != session('verifyCode')){

                return back()->with('errors','验证码错误');
            }

            
            
            return redirect('home/forget/edit');

        }else{

            return back()->with('errors','请输入正确的账号名');
        }
    
    }

    public function getEdit()
    {
        return view('home.forget.edit');
    }

    /*
     *执行重置密码动作
     */
    public function postUpdate(Request $request)
    {
        $input = Input::except('_token');

        //验证字段
        $rule = [
            'password'=>'required|between:6,18',
            'repassword'=>'required|same:password'
        ];

        $mess = [
            'password.required'=>'密码必须输入',
            'password.between'=>'密码的长度在6-18位之间',
            'repassword.required'=>'确认密码必填',
            'repassword.same'=>'两次次密码不一致'
        ];

        $validator = Validator::make($input, $rule,$mess);
        //如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $password = Crypt::encrypt($input['password']);

        $data = sad_home_user::where('phone',$input['username'])->orwhere('email',$input['username'])->first();

        $data->password = $password;

        $res = $data->save();

        if($res){

            return view('home.succee.forget');
        }else{

            echo '修改失败';
        }

    }
    /*
     *给邮箱发送忘记密码的验证码
     */
    public function getYanzheng()
    {   
        // 获取输入的账户名
        $data =  Input::all();

        $email = $data['username'];

        $verifyCode = rand(1000,9999);

        session(['verifyCode'=>$verifyCode]);

        self::_mail($email, $verifyCode);

    }


    static public function _mail($email, $verifyCode)
    {
        Mail::send('home.mail.forget',['verifyCode'=>$verifyCode],function($m) use ($email){

            $m->to($email)->subject('翻面账号验证邮件!');
        });
    }

    /**
     *给手机发送忘记密码的验证码
     */
    public function getPhoneverify(Request $request)
    {

        $phoneVerify = $request->input('phone');

        //判断缓存中值是否存在
        $exists = \Redis::exists('STRING:PHONE:CODE:'.$phoneVerify);

        if(!empty($exists)){

            return response()->json(['status'=>'400','message'=>'重复发送']);
        }

        $code = rand(1000,9999);
        session(['phoneVerify'=>$code]);

        $url = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C94888118&password=8c9601079ba846faba31d86b7b25f755&format=json&mobile='.$phoneVerify.'&content=您的验证码是：'.$code.'。请不要把验证码泄露给其他人。';

        $ch = curl_init();
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        // 将json转化为数组
        // var_dump($res);
        $arr = json_decode($res,true);

        //判断短信是否发送成功
        if($arr['code'] == 2){

            \Redis::setex('STRING:PHONE:CODE:'.$phoneVerify,60,$code);
            echo $arr['code'];
        }
    }



}