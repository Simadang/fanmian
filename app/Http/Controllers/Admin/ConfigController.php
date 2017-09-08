<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\confInsertRequest;
use App\Http\Requests\confUpdateRequest;
use App\Models\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = Config::select('*') -> orderBy('order') -> get();
        // return view('admin.config.index',['data'=>$data]);
        $data = Config::orderBy('order','asc')->get();
        foreach($data as $k=>$v){
            switch ($v['type']){
                case 'input':
//                    <input type="text" name="conf_name">
                 $v['content'] = '<input class="lg" type="text" name="content[]" value="'.$v['content'].'">';

                    break;
                case "textarea":
//                    <textarea name="conf_tips"></textarea>
                    $v['content'] = '<textarea name="content[]">'.$v['content'].'</textarea>';
                    break;

                case 'radio':
//                    1|开启,0|关闭
//                <input type="radio" name="conf_content[]" value="1">开启　
//                <input type="radio" name="conf_content[]" value="0">关闭　
                   $a = explode(',',$v['value']);
//                    $a = [
//                        0=>'1|开启',
//                        1=>'0|关闭'
//                    ]
                    $str = '';
                    foreach ($a as $m=>$n){
//                        $n = '1|开启';
//                        $n = [
//                            0=>1,
//                            1=>'开启'
//                        ]
                        $aa = explode('|',$n);
//                        <input type="radio" name="conf_content[]" value="1">开启　
//                        判断此单选按钮是否被选中
                       $c = ($aa[0] == $data[$k]['content'])?'checked':'';
                      $str.= '<input  type="radio" name="content[]" '.$c.' value="'.$aa[0].'">'.$aa[1];
                    }
                    $v['content'] = $str;
                    break;
            }
        }
        return view('admin.config.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.add',['title'=>'网站配置添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(confInsertRequest $request)
    {
        $data =  $request->except('_token');
      // dd($data);

        $conf = new Config;
        $conf->title = $data['title'];
        $conf->name = $data['name'];
        $conf->type = $data['type'];
        $conf->tips = $data['tips'];
        $conf->content = $data['content'];
        $conf->order = $data['order'];
        $conf->value = $data['value'];
        if($conf->save()){

            return redirect('/admin/config')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
        // $conf =  Config::create($input);
        // if($conf){
        //     $this->putFile();
        //     return redirect('admin/config');
        // }else{
        //     return back()->with('errors','添加失败');
        // } 
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
        $data = Config::find($id);
        return view('admin.config.edit',['title'=>'用户修改','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(confUpdateRequest $request, $id)
    {
        $data =  $request->except('_token');
      // dd($data);

        $conf = Config::find($id);
        $conf->name = $data['name'];
        $conf->type = $data['type'];
        $conf->tips = $data['tips'];
        $conf->content = $data['content'];
        $conf->order = $data['order'];
        $conf->value = $data['value'];
        if($conf->save()){

            return redirect('/admin/config')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = [];
        $re =  Config::find($id)->delete();
        if($re){
            // $data['status']= 0;
            $data['msg']='删除成功';
        }else{
           // $data['status']= 1;
           $data['msg']='删除失败';
        }
        return $data;
    }
}
