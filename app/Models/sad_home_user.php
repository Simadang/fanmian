<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_home_user extends Model
{
    //修改表名
    public $table = 'home_user';

    // 取消时间戳
    public $timestamps = false;
<<<<<<< HEAD
=======
    
	// 对商品板块列表一对多
	// 此表为主表1
    public function home_user()
    {
    	return $this->hasMany('App\Models\sad_goods','uid','id');
    }
>>>>>>> 09aaf330368a19ac9e553b44281471e5b4656990
}
