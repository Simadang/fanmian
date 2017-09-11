<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use Illuminate\Support\Facades\Validator;
use App\Models\sad_home_user;
use App\Models\sad_userinfo;
use Input;
use Mail;



class SafetyController extends Controller
{
    /**
     * 加载安全设置的主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        
        $user = session('user');
        $info = sad_userinfo::where('uid',$user['id'])->get();
        // dd($info);
        return view('home.safety.index',compact('user','info'));
    }
//===================================密码===============================================
    /**
     * 加载用户修改密码的主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getPassword()
    {
       
        //获取登录用户的信息,得到他的密码分配到模板
        $user = session('user');
        // dd($user['password']);
        //解密密码
        $password = Crypt::decrypt($user['password']);
        // dd($password);

        return view('home.safety.password',compact('password'));
    }

    /**
     * 执行密码的修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDopass(Request $request)
    {
            //1.获取用户要修改的密码的信息
             $data = $request->except('_token');
        // dd($data);
        //验证字段
        $rule = [
            // 'username'=>'required|between:5,12|unique:home_user',
            'password'=>'required|between:6,18',
            'repassword'=>'required|same:password'
        ];

        $mess = [
            // 'username.required'=>'用户名必须输入',
            // 'username.between'=>'用户名的长度在6-18位之间',
            // 'username.unique'=>'用户名存在',
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
        // $email = $data['email'];
        // $username = $data['username'];
        $token = str_random(50);
        $ctime = time();
        $password = Crypt::encrypt($data['password']);

        // $arr = ['email'=>$email,'remember_token'=>$token,'username'=>$username,'ctime'=>$ctime,'password'=>$password];
        
        //检查是否修改成功
        //在修改密码的时候先把改用户的详细信息查询到,然后再修改,如果不查询,修改的时候则会重新加一条数据
       $user = session('user');
        $home_user = new sad_home_user;
        $result = $home_user ->find($user['id']);
        // dd($result);
        //解密密码
        // $password = Crypt::decrypt($result ->password);
        // dd($password);
        $result ->password = $password;
        $res = $result ->save();
        if($res){

             return redirect("/safety/password");
        }else{
            return back()->with('errors','修改失败');
            
        }

    }
//=============================================手机=================================
    /**
     * 加载换帮手机的页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBindphone()
    {
         //获取登录用户的信息,得到他的手机分配到模板
        $user = session('user');
        // dd($user['phone']);

        return view('home.safety.bindphone',compact('user'));
    }
      /**
     *发送手机验证码
     */
    public function getPhoneCode(Request $request){

        $phone = $request->input('phone');
            // dd($phone);
        $code = rand(1000,9999);
        session(['phone'=>$code]);

        $url = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C94888118&password=8c9601079ba846faba31d86b7b25f755&format=json&mobile='.$phone.'&content=您的验证码是：'.$code.'。请不要把验证码泄露给其他人。';

        $ch = curl_init();
        // 添加apikey到header
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        // 执行HTTP请求
        curl_setopt($ch,CURLOPT_URL,$url);
        $res = curl_exec($ch);
        // 将json转化为数组
        // var_dump($res);
        $arr = json_decode($res,true);
        echo $arr['code'];
    }

     /**
     *执行手机换帮操作
     */
    public function postUpdate(Request $request){

        //表单获取字段
        $data = $request->except('_token');
        // dd($data);

        //验证字段
        $rule = [
            'phone'=>'required|regex:/^1[345789]\d{9}$/',
            // 'password'=>'required|between:6,18',
            'rephone'=>'required|same:phone'
        ];

        $mess = [
            'phone.required'=>'手机必须输入',
            // 'phone.between'=>'用户名的长度在6-18位之间',
            // 'phone.required'=>'密码必须输入',
            'phone.regex'=>'手机格式不对',
            'rephone.required'=>'确认手机必填',
            'rephone.same'=>'两次次手机不一致'
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

         $token = str_random(50);
        $ctime = time();
        $phone = $data['phone'];

        // $arr = ['email'=>$email,'remember_token'=>$token,'username'=>$username,'ctime'=>$ctime,'password'=>$password];
        
        //检查是否修改成功
        //在修改密码的时候先把改用户的详细信息查询到,然后再修改,如果不查询,修改的时候则会重新加一条数据
       $user = session('user');
        $home_user = new sad_home_user;
        $result = $home_user ->find($user['id']);
        // dd($result);
        //解密密码
        // $password = Crypt::decrypt($result ->password);
        // dd($password);
        $result ->phone = $phone;
        $res = $result ->save();
        if($res){

             return redirect("/safety/bindphone");
        }else{
            return back()->with('errors','修改失败');
            
        }
    }
   /**
     *ajax 验证手机号
     */
    public function postYanzheng3(Request $request){

        $phone = Input::except('_token');
        // dd($phone);
        $res = sad_home_user::where('phone',$phone)->first();
            // dd($res);
        if($res){

            return 1;
        }else{

            return 0;
        }
//===================================邮箱=====================================
  }
  /*
  *
  *绑定邮箱
  *
  */
  public function getEmail()
  {
    return view('home.safety.email');
  }
  /*
  *
  *验证添加邮箱的操作
  *
  */
  public function postDoemail(Request $request)
  {

//获取用户要绑定的邮箱的信息
        $request = $request ->except('_token');
        // dd($request);
         //验证字段
        $rule = [
            'email'=>'required|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',
            'code'=>'required',
            // 'rephone'=>'required|same:phone'
        ];

        $mess = [
            'email.required'=>'手机必须输入',
            // 'phone.between'=>'用户名的长度在6-18位之间',
            'code.required'=>'确认码必须输入',
            'email.regex'=>'手机格式不对',
            // 'rephone.required'=>'确认手机必填',
            // 'rephone.same'=>'两次次手机不一致'
        ];
        $validator = Validator::make($request, $rule,$mess);
        //如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //手机验证码验证
        if($request['code'] != session('verifyCode')){
            return back()->with('errors','验证码不正确');
        }

         $token = str_random(50);
        $ctime = time();
        $email = $request['email'];

        // $arr = ['email'=>$email,'remember_token'=>$token,'username'=>$username,'ctime'=>$ctime,'password'=>$password];
        
        //检查是否修改成功
        //在修改密码的时候先把改用户的详细信息查询到,然后再修改,如果不查询,修改的时候则会重新加一条数据
       $user = session('user');
        $home_user = new sad_home_user;
        $result = $home_user ->find($user['id']);
        // dd($result);
        //解密密码
        // $password = Crypt::decrypt($result ->password);
        // dd($password);
        $result ->email = $email;
        $res = $result ->save();
        if($res){

             return redirect("/safety/email");
        }else{
            return back()->with('errors','修改失败');
            
        }

  }

   /**
     *ajax 验证邮箱
    */
    public function postYanzheng1(){

        // $email = $request->except('_token');
        $email = Input::except('_token');

        $res = sad_home_user::where('email',$email)->first();

        if($res){

            return 1;
        }else{

            return 0;
        }
    }
      /*
     *绑定邮箱发送的验证码
     */
    public function postYanzheng()
    {   
        // 获取输入的账户名
        $data =  Input::all();
        // dd($data);
        $email = $data['email'];

        $verifyCode = rand(1000,9999);

        session(['verifyCode'=>$verifyCode]);

        self::_mail($email, $verifyCode);

    }


    static public function _mail($email, $verifyCode)
    {
        Mail::send('home.mail.forget',['verifyCode'=>$verifyCode],function($m) use ($email){

            $m->to($email)->subject('翻面账号添加验证邮件!');
        });
    }
  
}
