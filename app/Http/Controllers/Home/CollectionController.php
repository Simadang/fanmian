<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\sad_collection;

class CollectionController extends Controller
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
        $collection = sad_collection::where('uid',$uid)->where('gid',$id)->first();
        $status = $collection['status'];
        $coll = new sad_collection;

        if($status == 1){
             $re =  sad_collection::where('uid',$uid)->where('gid',$id)->first()->delete();
            if($re){
                return back();
            }else{
                return back()->with('error','取消收藏失败');
            }
        }

        if(empty($status)){
            $coll->uid = $uid;
            $coll->gid = $id;
            $coll->status = 1;

            if($coll->save()){
                return back();
            }else{
                return back()->with('error','添加收藏失败');
            }
        }        
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
        
    }
}
