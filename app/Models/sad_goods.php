<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_goods extends Model
{
    //修改表名
    public $table = 'goods';

    // 取消时间戳
    public $timestamps = false;

    // 对前台用户列表一对多
    // 此表为副表1
    public function home_user()
    {
    	return $this->belongsTo('App\Models\sad_home_user','uid','id');
    }

    // 对商品板块列表一对多
    // 副表2
    public function type()
    {
    	return $this->belongsTo('App\Models\sad_type','tid','id');
    }


    // 对评论板块列表一对多
    // 此表为主表1
    public function comment1()
    {
        return $this->hasMany('App\Models\sad_comment','gid','id');
    }

}
