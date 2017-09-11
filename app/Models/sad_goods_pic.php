<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_goods_pic extends Model
{
    //修改表名
    public $table = 'goods_pic';

    // 取消时间戳
    public $timestamps = false;

 //    // 对搜索页面的图片展示一对多
	// // 此表为主表3
 //    public function home_user()
 //    {
 //    	return $this->hasMany('App\Models\sad_goods','pic','id');
 //    }
}
