<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_question;
use App\Models\sad_answer;

class QuestionController extends Controller
{
    /**
     * 加载鱼塘的列表主页
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //获取数据库中的数据,遍历到后台表格中
        $data = sad_question::all();


        return view('admin.question.index',compact('data'));
    }
     
//============================================================================================
    /*
    *
    *加载回复的主页面
    *
    */
    public function getAnswer($id)
    {
        // $data = sad_question::where('uid',5)->get();
        // dd($tt);
        // $id = $request ->only('uid');
        // dd($id);
        //获取数据库中的数据,遍历到后台表格中

        $data = sad_answer::where('qid',$id)->get();
        // dd($data);

        return view('admin.question.answer',['data'=>$data]);
    }
    /*
    *
    *回复页面  堂主的删除回复留言动作
    *
    */
    public function getDelete($id)
    {
         
       
        $re =  sad_answer::find($id)->delete();
        // dd($re);
        if($re){
            
            return redirect('admin/question/index')->with('success','删除成功');
        }else{
          return back()->with('errors','删除失败');
        }
       
    }
    /*
    *
    *堂主回复用户的评论
    *
    *
    */
    public function getReply($id)
    {
          
            //获取用户的数据问题
            $data = sad_question::find($id);
           $res = $data ->question;
           // dd($res);
        return view('admin.question.reply',compact('res'));
    }
    /*
    *
    *提交堂主回复的内容
    *
    */
    public function postReply()
    {
        echo 123;
    }
    /*
    *
    *回收站处理
    *
    */
    public function display()
    {
        echo 123;
    }
}
