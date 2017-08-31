<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_type extends Model
{
    //修改表名
    public $table = 'type';

    // 取消时间戳
    public $timestamps = false;


	// 对商品板块列表一对多
	// 此表为主表2
    public function type()
    {
    	return $this->hasMany('App\Models\sad_goods','tid','id');
    }
}
