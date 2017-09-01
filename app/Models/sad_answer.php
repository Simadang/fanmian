<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_answer extends Model
{
    //修改表名
    public $table = 'answer';

    // 取消时间戳
    public $timestamps = false;
      // 对前台用户列表一对多
    // 此表为副表1
    public function answer()
    {
    	return $this->belongsTo('App\Models\sad_question','uid','id');
    }
}

