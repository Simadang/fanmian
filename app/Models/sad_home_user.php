<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_home_user extends Model
{
    //修改表名
    public $table = 'home_user';

    // 取消时间戳
    public $timestamps = false;

    // 定义与goods表的多态关联
    public function goods()
	{
	    return $this->morphMany('App\Models\sad_goods','aaaa');
	}
}
