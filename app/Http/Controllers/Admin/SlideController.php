<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_slide;
use Input;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //将数据库中的数据分配到主页面中
        $data = sad_slide::all();
        // dd($data);

        return view('admin.slide.index',compact('data'));
    }

    /**
     * 加载轮播图添加页面的方法
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.slide.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //接受用户提交的数据
        //  if($request -> hasFile('url')){
        //     //处理文件名称
        //     $temp_name = md5(time()+rand(1000,9999));
        //     //获取文件后缀
        //     $hz = $request -> file('url') -> getClientOriginalExtension();
        //     //设置文件路径
        //     $temp_path = './uploads/';
        //     //拼接文件名
        //     $name = ltrim('/'.$temp_name.'.'.$hz,'.');
        //     //拼接进数据库的文件名
        //     $temp_name2 = $temp_name.'.'.$hz;
        //     //存入文件中
        //     // echo $temp_name2."<br>";
        //     //存入数据库中
        //     // $name;
        //     //文件上传
        //     $request -> file('url') -> move($temp_path,$temp_name2);
        //     //把$name存入数据库中

             
        // } 

         $data =$request ->input();
         // dd($data);
                            //添加数据库
                    //判断是否提交了空数据
                  if($data['pic'] == "" || $data['url'] == ""){
                            return back() -> with('errors','不能提交空数据');

                    }else{
                        
                            $user = new sad_slide;
                             $user ->pic = $data['pic'];
                             $user ->url = $data['url'];                              
                            if($user ->save()){
                                return redirect('admin/slide') ->with('success','添加成功');
                            }else{
                                return back() -> with('errors','添加失败');
                            }

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
        // $data = Input::find($id);
        // dd($data);
        // echo 123;
          // $link = Sad_link::find($id);
        // if($link->delete()){
        //     return redirect('/admin/link')->with('success','删除成功');
        // }else{
        //     return back()->with('error','失败');
        // }
        $data = [];
        $re =  Sad_slide::find($id)->delete();
        if($re){
            $data['status']= 0;
            $data['msg']='删除成功';
        }else{
           $data['status']= 1;
           $data['msg']='删除失败';
        }
        return $data;

    }
 //    文件上传
    public function upload(Request $request)
    {

//        获取文件对象
        $file = Input::file('file_upload');
       // dd($file);
//        判断文件是否有效
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = md5(time()).mt_rand(1000,9999).'.'.$entension;

//            1上传到本地服务器
            $path = $file->move(public_path().'/uploads',$newName);
//            2上传到七牛云
//            writeStream（要上传的七牛存储空间的路径，你要上传的文件当前服务器上的路径）
//            \Storage::disk('qiniu')->writeStream('uploads/'.$newName, fopen($file->getRealPath(), 'r'));


            //3阿里 OSS 图片上传
            // 获取图片在临时文件中的地址
//            $pic = $file->getRealPath();
//            $result = OSS::upload('uploads/'.$newName, $pic);

            $filepath = 'uploads/'.$newName;
            return  $filepath;
        }
    }

    
}
