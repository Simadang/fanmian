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
<<<<<<< HEAD
=======
=======
>>>>>>> da401561e24055f0a24f81ae05fd51b11e023320
    
	// 对商品板块列表一对多
	// 此表为主表1
    public function home_user()
    {
    	return $this->hasMany('App\Models\sad_goods','uid','id');
    }
<<<<<<< HEAD
>>>>>>> 09aaf330368a19ac9e553b44281471e5b4656990
=======
>>>>>>> da401561e24055f0a24f81ae05fd51b11e023320
}
