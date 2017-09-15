<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsInsterRequest;
use App\Models\sad_goods;
use App\Models\sad_goods_pic;
use App\Models\sad_comment;
use App\Models\sad_collection;
use App\Models\sad_type;
use App\Models\User;
use Input;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //调用Goods
        // 在此只找了id=3;
        $goods = sad_goods::find(3);
        $info = sad_goods::join('goods_pic','goods.pid','=','goods_pic.id')->get();
        $data = sad_comment::all();
        
        foreach($data as $k=>$v)
        {
            $name =  sad_comment::find($v['id'])->comment->username;
            $data[$k]['uid'] = $name;
            // dd($name);
        }

        $num = Sad_comment::join('goods','comment.gid','=','goods.id')->count();



        return view('home.goods.index',['goods'=>$goods,'info'=>$info,'data'=>$data,'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uid = session('user')['id'];

        $type = sad_type::all();

        $data = [];

         foreach($type as $k=>$v)
        {
            $len = substr_count($v['path'],',');
            if($len == 2){
                $data[] = $v;
            }
        }

        return view('home.goods.add',['uid'=>$uid,'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsInsterRequest $request)
    {
        $all = $request ->all();

        // 调用upload函数上传图片并获取存入goods数据库的信息
        if(!empty($all['file_upload'])){
             $pic = $this->upload('file_upload');
        }else{
            return back() -> with('errors','请添加商品封面图片');
        }

        // 调用upload函数上传图片并获取存入goods_pic数据库的信息
        if(!empty($all['file_upload1'])){
             $pic1 = $this->upload('file_upload1');
        }else{
            return back() -> with('errors','请至少添加一张商品详情图片');
        }
        if(!empty($all['file_upload2'])){
             $pic2 = $this->upload('file_upload2');
        }else{
            $pic2 = '';
        }
        if(!empty($all['file_upload3'])){
             $pic3 = $this->upload('file_upload3');
        }else{
            $pic3 = '';
        }

        $gp = new sad_goods_pic;

        $gp->pic1 = $pic1;
        $gp->pic2 = $pic2;
        $gp->pic3 = $pic3;

        // 如果添加成功查询pid
        if($gp->save()){
            $goodsp = \DB::table('goods_pic')->where('pic1',$pic1)->get();
        }else{
            return back()->with('error','添加失败');
        }

        //取出pid
        $pid = $goodsp[0]['id'];

        // 调用goods
        $goods = new sad_goods;

        
        $goods->uid = $all['uid'];
        $goods->tid = $all['tid'];
        $goods->title = $all['title'];
        $goods->intro = $all['intro'];
        $goods->price = $all['price'];
        $goods->reprice = $all['reprice'];

        // 暂时没有pid
        $goods->pid = $pid;

        $goods->pic = $pic;
        $goods->num = $all['num'];
        $goods->condition = $all['condition'];

       

        if($goods->save()){
            $good = \DB::table('goods')->where('pic',$pic)->get();
            // dd($good);
            $id = $good[0]['id'];
            return redirect('/home/goods/'.$id)->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

     public function upload($file)
    {
       //        获取文件对象
            $file = Input::file($file);
    // dd($file);
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = md5(time()).mt_rand(1000,9999).'.'.$entension;

//            1上传到本地服务器
            $path = $file->move(public_path().'/h/images',$newName);

            //3阿里 OSS 图片上传
            // 获取图片在临时文件中的地址
//            $pic = $file->getRealPath();
//            $result = OSS::upload('uploads/'.$newName, $pic);

            $filepath = 'h/images/'.$newName;
            return $filepath;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uid = session('user')['id'];
        $goods = sad_goods::find($id);
        $pid = $goods->pid;
        $info = sad_goods_pic::find($pid);
        $data = sad_comment::where('gid',$id)->get();
        $collection = sad_collection::where('uid',$uid)->where('gid',$id)->first();
        $status = $collection['status'];

        foreach($data as $k=>$v)
        {
            $name =  sad_comment::find($v['id'])->comment->username;
            $data[$k]['uid'] = $name;
        }

        $num = Sad_comment::where('gid',$id)->count();
        // dd($goods['condition']);

        $c = '';
            switch ($goods['condition']) {
                case '0':
                    $c = '九九新';
                    break;
                case '1':
                
                    $c = '九成新';
                    break;
                case '2':
                    $c = '八成新';
                    break;
                case '3':
                    $c = '七成新';
                    break;
                
                case '4':
                    $c = '垃圾成色';
                    break;
                default: 

                    break;
            }
            $goods['condition'] = $c;
            // dd($goods);


        return view('home.goods.index',['status'=>$status,'uid'=>$uid,'goods'=>$goods,'info'=>$info,'data'=>$data,'num'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
}
