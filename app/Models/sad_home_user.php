<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_home_user extends Model
{
    //修改表名
    public $table = 'home_user';

    // 取消时间戳
    public $timestamps = false;
  
	// 对商品板块列表一对多
	// 此表为主表1
    public function home_user()
    {
    	return $this->hasMany('App\Models\sad_goods','uid','id');
    }


    // 对评论板块列表一对多
    // 此表为主表1
    public function comment()
    {
        return $this->hasMany('App\Models\sad_comment','uid','id');
    }
    //对用户详情表一对一
    //此表为主表
    public function detail()
    {
        return $this->hasOne('App\Models\sad_userinfo','uid','id');

    }


    /**
     * 对鱼塘问题板块列表一对多
     * 此表为主表
     */


    public function tiwen()
    {
        return $this->hasMany('App\Models\sad_question','uid','id');
    }


    /**
     * 对鱼塘回答板块列表 一对多
     * 主表
     */
    public function huifu()
    {
        return $this->hasMany('App\Models\sad_answer','uid','id');
    }
}
