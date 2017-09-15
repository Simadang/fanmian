<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Validator;

class PayController extends Controller
{
    /**
     * 加载支付主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {           
        //上面getIndex()括号内是要有一个$id 的参数的
        //将数据库中的用户的地址管理遍历到页面中(登录用户的id 暂时先写死  目前先给了一个 1)
            $user = session('user');
            // dd($user);
            $id = $user['id'];
            // dd($id);

        $user = DB::table('useraddress')->where('uid',$id)->get();
        // dd($user);
        //获取用户要购买的商品的信息,分配到页面
        $goods = DB::table('goods')->where('id',$request->id)->get();
        // dd($goods);
        return view('home.pay.index',compact('user','goods'));
    }
    /*
    *
    *执行添加地址的动作
    *
    *
    */
    public function postStore(Request $request)
    {
            
        //获取用户修改的地址的信息
        $data = $request -> except('_token');
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


            //把数据添加到数据库中
            $res = DB::table('useraddress')->insert($data);
            if($res){
                return redirect('pay/index');
            }else{
                return back()->with('errors','添加失败');
            }

    }
    /*
    **
    **
    *删除地址的操作
    *
    */
    public function getDel($id)
    {
        //执行删除地址的动作
        $res = DB::table('useraddress')->where('id',$id)->delete();
        // dd($res);
        if($res){
            return redirect('pay/index');
        }else{
            return back()->with('errors','删除失败');
        }
    }
    /*
    *
    *修改用户地址的页面
    *
    */
    public function getEdit($id)
    {
        

        // dd($id);
        //获取用户要修改的地址的id,以此来获得该用户的地址的详细信息
           $res = DB::table('useraddress')->find($id);
        // dd($res);
        return view('home.pay.edit',compact('res'));
    }
    /*
    *
    *用户修改地址的动作
    *
    */
    public function postUpdate(Request $request,$id)
    {
        // dd($id);
        //通过id 获取用户要修改的所有数据
        $request = $request ->except('_token');
        // dd($request);
       
        //验证规则
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
        $validator = Validator::make($request, $rule,$mess);  
        //        如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        } 
        //3.执行修改的动作,并添加到数据库中
           $res = DB::table('useraddress')->where('id',$id)->update(['name'=>$request['name'],'phone'=>$request['phone'],'address'=>$request['address']]);
           if($res){
            return redirect('pay/index');
        }else{
            return back()->with('errors','删除失败');
        }
    }
    /*
    *
    *成功提交订单的路由
    *
    */
    public function postSuccess(Request $request)
    {   

        $request = $request ->except('_token');
        
        //获取当前登录用户的id
        $uid = session('user')['id'];

        //获取当前商品的id
        $gid = $request['gid'];

        // $res = DB::table('order')->where('uid',$uid)->where('gid',$gid)->update(['status'=>1]);

        $goods = \DB::table('goods')->where('id',$gid)->first();
        
        // dd($goods);
        
        $rid = $goods['uid'];
        $gid = $goods['id'];
        $uid = $uid;
        $num = $request['num'];

        $name = '副组长';
        $tel = '13788888888';
        $address = '北京市昌平区回龙观鼓楼';
        $cost = $request['cost'];
        $ordertime = date('Y-m-d H:i:s',time());
        $code =rand(000,999);
        $arr = ['rid'=>$rid,'gid'=>$gid,'uid'=>$uid,'name'=>$name,'tel'=>$tel,'address'=>$address,'cost'=>$cost,'code'=>$code,'ordertime'=>$ordertime,'status'=>1];
        // session(['order'=>$arr]);
        // session('order',$arr);
        $data = DB::table('order')->insert($arr);

        return view('home.pay.success',compact('request'));
        
        
    }
     /*
    *
    *w
    */
    public function getSell()
    {

        //获取卖家的信息
        $user = session('user');
        // dd($user);
          $arr = DB::table('order')->join('goods','order.gid','=','goods.id')->where('rid',$user['id']) ->get();
          $arr1 = DB::table('order')->join('goods','order.gid','=','goods.id')->where('status','1')->where('rid',$user['id']) ->get();
          // dd($arr1);
          $data = [];
          foreach($arr as $k=>$v){

            if($v['status'] != 3 || $v['status'] != 4){
                $data[] = $v;

            }

          }
            // dd($data);

        return view('home.pay.sell',compact('data','arr1'));
    }

     /*
    *
    *w
    */
    public function postConfirm(Request $request)
    {

       
         $data = $request->except('_token');
        
         $res = DB::table('order')->where('rid',$data['rid'])->where('gid',$data['gid'])->update(['status'=>2]);

         if($res){

            return 1;
         }else{

            return 0;
         }


        
    }



}
