<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_ad;
use DB;
use Input;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //将数据库中的数据分配到主页面中
        $data = sad_ad::all();
        // dd($data);

        return view('admin.ad.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request ->except('_token');
        $id= $data['id'];

       //添加数据库
        //判断是否提交了空数据
      if($data['pic'] == "" || $data['url'] == "" || $data['name'] == "" || $data['content'] == ""){
                return back() -> with('errors','不能提交空数据');

        }else{
            
                // $user = new sad_ad;
                $re =  Sad_ad::find($id)->delete();

                // $res = DB::table('ad')->where('id', $id)->update($data);
                $user = new sad_ad;
                $user ->pic = $data['pic'];
                $user ->url = $data['url'];                              
                $user ->name = $data['name'];                              
                $user ->content = $data['content'];    

                
                if($user ->save()){
                    return redirect('admin/ad') ->with('success','添加成功');
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
       
        return view('admin.ad.create',['id'=>$id]);
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
            $path = $file->move(public_path().'/uploads/ad',$newName);
//            2上传到七牛云
//            writeStream（要上传的七牛存储空间的路径，你要上传的文件当前服务器上的路径）
//            \Storage::disk('qiniu')->writeStream('uploads/'.$newName, fopen($file->getRealPath(), 'r'));


            //3阿里 OSS 图片上传
            // 获取图片在临时文件中的地址
//            $pic = $file->getRealPath();
//            $result = OSS::upload('uploads/'.$newName, $pic);

            $filepath ='uploads/ad/'.$newName;
            return  $filepath;
        }
    }
}
