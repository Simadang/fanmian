<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_userinfo extends Model
{
    //修改表名
    public $table = 'userinfo';

    // 取消时间戳
    public $timestamps = false;
    //对前台用户模型表的属于
    //此表为附表
      public function home_user()
    {
        return $this->belongsTo('App\Models\sad_home_user','uid','id');
    }
}
