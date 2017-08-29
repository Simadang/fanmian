<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TypeController extends Controller
{
   
  

     // 处理分类
    static public function getCates()
    {
        // $data = DB::select("select *,concat(path,',',id) as paths from cate order by paths");
        $data = DB::table('type')->select(DB::raw("*,concat(path,',',id) as paths"))->orderBy('paths')->get();
        foreach ($data as $key => $value) {
            // 统计一个字符串在另一个字符串出现次数
            $len = substr_count($value['path'],',');
            // $data[$key]['name']
            // |----男装
            // 重复的使用一个字符串
           $data[$key]['name'] = str_repeat('|----',$len).$value['name'];
        }
        return $data;
    }
      /*
    *
    *加载分类列表页面
    *
    */
     public function getIndex()
    {
        // dd(self::getCatePid(0));

        return view('admin.type.index',['data'=>self::getCates()]);
    }
   /*
   *
   *分类添加
   */ 
   public function getCreate($id = '')
    {
        // 加载模版
        return view('admin.type.create',['data'=>self::getCates(),'id'=>$id]);
    } 
    /*
    *
    *处理添加的动作
    *
    */
     public function postInsert(Request $request)
    {  
        $temp = $request -> except('_token');
        $pid = $temp['pid'];

        if($pid == '--请选择--'){
            // 顶级分类
            $temp['path'] = 0;
            $temp['pid'] = 0;
        }else{
            // 不是顶级分类
            $parentData = DB::table('type')->where('id',$pid)->first();
            $temp['path'] =  $parentData['path'].','.$parentData['id'];
        }
        //将数据插入到数据库
        $res =DB::table('type')->insert($temp);
        if($res){
            return redirect('admin/type/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
     /**
     * 删除动作
     */
    public function getDelete($id)
    {
        // 查询 当前分类下面是否有子类
        $res = DB::table('type')->where('pid',$id)->first();
        if($res){
            return back()->with('error','当前类别有子类，不允许删除');
        }

        $res = DB::table('type')->where('id',$id)->delete();
        if($res){
            return redirect('/admin/type/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
     /**
     * 修改
     */
    public function getEdit(Request $request,$id)
    {   
        $res = DB::table('type')->where('id',$id)->first();
        return view('admin.type.edit',['data'=>self::getCates(),'res'=>$res]);
    }
     /**
     * 修改操作
     */
    public function postUpdate(Request $request,$id)
    {
        // 查询 当前分类下面是否有子类
        $res = DB::table('type')->where('pid',$id)->first();
        if($res){
            return back()->with('error','当前类别有子类，不允许修改');
        }

        // 处理修改字段
        $temp = $request -> except('_token');
        $pid = $temp['pid'];

        if($pid == 0){
            // 顶级分类
            $temp['path'] = 0;
        }else{
            // 不是顶级分类
            $parentData = DB::table('type')->where('id',$pid)->first();
            $temp['path'] =  $parentData['path'].','.$parentData['id'];
        }

        // 修改数据库 
        $res = DB::table('type')->where('id',$id)->update($temp);
        if($res){
            return redirect('admin/type/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

}
