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

class RegistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.regist.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单获取字段
        $data = $request->except('_token');
        // dd($data);
        //验证字段
        $rule = [
            'username'=>'required|between:5,12|unique:home_user',
            'password'=>'required|between:6,18',
            'repassword'=>'required|same:password'
        ];

        $mess = [
            'username.required'=>'用户名必须输入',
            'username.between'=>'用户名的长度在6-18位之间',
            'username.unique'=>'用户名存在',
            'password.required'=>'密码必须输入',
            'password.between'=>'密码的长度在6-18位之间',
            'repassword.required'=>'确认密码必填',
            'repassword.same'=>'两次次密码不一致'
        ];
        $validator = Validator::make($data, $rule,$mess);

        //如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //添加到数据库
        $email = $data['email'];
        $username = $data['username'];
        $token = str_random(50);
        $ctime = time();
        $password = Crypt::encrypt($data['password']);

        $arr = ['email'=>$email,'remember_token'=>$token,'username'=>$username,'ctime'=>$ctime,'password'=>$password];
        
        //检查是否添加成功
        $user = new sad_home_user;

        $id = $user->insertGetId($arr);
        if($id){

            self::_mail($email, $id, $token);
            echo "<script>alert('注册成功,请到收件箱点击邮件激活账号');window.location.href='/home/login/index'</script>";
        }else{

            echo "<script>alert('抱歉，注册失败！');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    static public function _mail($email, $id, $token){

        Mail::send('home.mail.index',['id'=>$id,'token'=>$token],function($m) use ($email){

            $m->to($email)->subject('翻面账号激活邮件!');
        });
    }

    public function Jihuo(Request $request){

        $data = $request->all();

        $user = sad_home_user::find($data['id']);

        if($user->remember_token != $data['token']){

            echo('验证失败');
        }

        $user->authority = 1;
        $user->remember_token = str_random(50);

        if($user->save()){
            // return redirect('home/login');
            echo '激活成功，请返回登录';
        }else{

            echo '激活失败';
        }
    }

    /**
     *发送手机验证码
     */
    public function phoneCode(Request $request){

        $phone = $request->input('phone');

        $code = rand(1000,9999);
        session(['phone'=>$code]);

        $url = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C94888118&password=8c9601079ba846faba31d86b7b25f755&format=json&mobile='.$phone.'&content=您的验证码是：'.$code.'。请不要把验证码泄露给其他人。';

        $ch = curl_init();
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        // 将json转化为数组
        // var_dump($res);
        $arr = json_decode($res,true);
        echo $arr['code'];
    }
    /**
     *执行手机注册
     */
    public function insert(Request $request){

        //表单获取字段
        $data = $request->except('_token');
        // dd($data);

        //验证字段
        $rule = [
            'username'=>'required|between:5,12',
            'password'=>'required|between:6,18',
            'repassword'=>'required|same:password'
        ];

        $mess = [
            'username.required'=>'用户名必须输入',
            'username.between'=>'用户名的长度在6-18位之间',
            'password.required'=>'密码必须输入',
            'password.between'=>'密码的长度在6-18位之间',
            'repassword.required'=>'确认密码必填',
            'repassword.same'=>'两次次密码不一致'
        ];
        $validator = Validator::make($data, $rule,$mess);
        //如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //手机验证码验证
        if($data['phonecode'] != session('phone')){
            return back()->with('errors','验证码不正确');
        }

        //添加到数据库
        $phone = $data['phone'];
        $username = $data['username'];
        $token = str_random(50);
        $ctime = time();
        $password = Crypt::encrypt($data['password']);
        $authority = 1;

        $arr = ['phone'=>$phone,'remember_token'=>$token,'username'=>$username,'ctime'=>$ctime,'password'=>$password,'authority'=>$authority];
        
        $user = new sad_home_user;

        $id = $user->insertGetId($arr);

        if($id){

            echo "<script>alert('恭喜!注册成功');window.location.href='/home/login/index'</script>";
        }else{

            echo "<script>alert('抱歉，注册失败！');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
        }
    }

    /**
     *ajax 验证邮箱
    */
    public function yanzheng1(){

        // $email = $request->except('_token');
        $email = Input::except('_token');

        $res = sad_home_user::where('email',$email)->first();

        if($res){

            return 1;
        }else{

            return 0;
        }
    }

    /**
     *ajax 验证用户名
    */
    public function yanzheng2(){

        $username = Input::except('_token');

        $res = sad_home_user::where('username',$username)->first();

        if($res){

            return 1;
        }else{

            return 0;
        }
    }

    /**
     *ajax 验证手机号
     */
    public function yanzheng3(Request $request){

        $phone = Input::except('_token');
        
        $res = sad_home_user::where('phone',$phone)->first();

        if($res){

            return 1;
        }else{

            return 0;
        }
        
    }

    

}
