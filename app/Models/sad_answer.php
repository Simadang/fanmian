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

    /**
     * 对用户板块列表 一对多
     * 副表
     */
    public function huifu()
    {
        return $this->belongsTo('App\Models\sad_home_user','uid','id');
    }


    //无黑名单
    public $guarded = [];
}

