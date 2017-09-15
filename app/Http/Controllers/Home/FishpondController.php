<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\sad_question;
use App\Models\sad_answer;
use Input;
use Crypt;

class FishpondController extends Controller
{
    /**
     * 处理前台数据 递归
     */
    static public function getCatePid($pid = 0,$qid)
    {
        $data = DB::table('answer')->where('qid',$qid)->where('pid',$pid)->orderBy('id','asc')->paginate(10);

        // $arrdata = [];
        // foreach ($data as $k => $v) {
            
            
        //     $arrdata[$k] = $v;
        // }

        // foreach ($arrdata as $k => $v) {
            
            
        //     $arrdata[$k]['username'] = sad_answer::find($v['id'])->huifu->username;
        // }

        // $arr = [];
        // foreach ($arrdata as $key => $value) {
        //     # code...
        //     $value['sub'] = self::getCatePid($value['id'],$value['qid']);
        //     $arr[] = $value;
        // }
        
        // return $arr;

        foreach ($data as $k => $v) {
            
            
            $data[$k]['username'] = sad_answer::find($v['id'])->huifu->username;
        }
        return $data;
    }
    
    /**
     *加载鱼塘首页
     *
     */
    public function getIndex(Request $request)
    {   

        //获取当前板块下的问题
        $tid = $request->tid;
        $name = $request->name;
        // $type = DB::table('type')->where('id','tid')->first();

        $data = DB::table('question')->where('tid',$tid)->orderBy('id','desc')->paginate(2);

        // $data = DB::table('question')->join('type','question.tid','=','type.id')->select('question.*','type.name')->where('tid',$tid)->get();
        
        return view('home.fishpond.index',['data'=>$data,'name'=>$name,'tid'=>$tid]);
    }

    /**
     *加载问题详情页
     *
     */
    public function getShow(Request $request)
    {   

        $qid = $request->qid;
        $question['tid'] = $request->tid;

        $question['content'] = $request->content;
        $question['ctime'] = $request->ctime;

        //查找提问的用户名(模型查找)
        $question['username'] = sad_question::find($qid)->tiwen->username;
        $question['qid'] = $qid;
        // dump($question);

        //查找提问的用户名(查询构造器查找,两表主键id相同无法查找)
        // $question = DB::table('question')->join('home_user','question.uid','=','home_user.id')->select('question.*','home_user.username')->where('id',$qid)->get();
        // dump($question);

        //查找该问题下的回答
        
        $answer = sad_answer::where('qid',$qid)->orderBy('id','asc')->paginate(10);
        // $answer = DB::table('answer')->where('qid',$qid)->get();

        //查找该回答的用户名
        foreach ($answer as $k => $v) {
            
            // dump($v->uid);
            // $aaa = sad_answer::find($v->id)->huifu->username;
            // dump($aaa);
            $answer[$k]['username'] = sad_answer::find($v->id)->huifu->username;
        };
        
        // dd(self::getCatePid(0,$qid));
        
        return view('home.fishpond.show',['question'=>$question,'answer'=>$answer]);
    }

    /**
     *添加问题
     *
     */
    public function postAdd()
    {   
        //获取ajax发送的数据
        $data = Input::all();

        $question['ctime'] = date('Y-m-d H:i:s',time());
        $question['content'] = $data['question'];
        $question['tid'] = $data['tid'];

        //DecryptException in BaseEncrypter.php line 48: The MAC is invalid
        //需重新生成秘钥,然后重新encryot密码
        // $password = Crypt::encrypt('123456');

        //获取当前登陆用户信息
        $user = session('user');
        $question['uid'] = $user['id'];
        
        $res = sad_question::create($question);
        // return $res;
        //添加成功
        if($res){

            return 1;
        }else{

            return 0;
        }
    }

    /**
     *添加内容回复
     *
     */
    public function postAnswer()
    {   
        //获取ajax发送的数据
        $data = Input::except('_token');
        
        //获取当前登陆用户信息
        $user = session('user');
        $data['uid'] = $user['id'];

        $data['ctime'] = date('Y-m-d H:i:s',time());
        // return $data;
        $res = sad_answer::create($data);
        // return $res;
        //添加成功
        if($res){

            return 1;
        }else{

            return 0;
        }
    }

    /**
     *添加盖楼回复
     *
     */
    public function postGl()
    {
        //获取ajax发送的数据
        $data = Input::except('_token');

        //获取当前登陆用户信息
        $user = session('user');
        $data['uid'] = $user['id'];

        //创建时间
        $data['ctime'] = date('Y-m-d H:i:s',time());

        //盖楼的父id及path(路径)
        $parentData = DB::table('answer')->where('id',$data['pid'])->first();
        $data['path'] =  $parentData['path'].','.$parentData['id'];
        
        $res = sad_answer::create($data);
        // return $res;
        //添加成功
        if($res){

            return 1;
        }else{

            return 0;
        }
    }
}
