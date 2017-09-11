<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_comment extends Model
{
    //修改表名
    public $table = 'comment';

    // 取消时间戳
    public $timestamps = false;

    // 对前台用户列表一对多
    // 此表为副表1
    public function comment()
    {
    	return $this->belongsTo('App\Models\sad_home_user','uid','id');
    }

    // 对商品板块列表一对多
    // 副表2
    public function comment1()
    {
    	return $this->belongsTo('App\Models\sad_goods','gid','id');
    }
}
