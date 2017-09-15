<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_question extends Model
{
    //修改表名
    public $table = 'question';

    // 取消时间戳
    public $timestamps = false;

    // 无黑名单
    public $guarded = [];

    // 对商品板块列表一对多
    // 此表为主表2
    public function question()
    {
        return $this->hasMany('App\Models\sad_answer','qid','id');
    }

    /**
     * 对用户板块列表 一对多
     * 副表
     */
    public function tiwen()
    {
        return $this->belongsTo('App\Models\sad_home_user','uid','id');
    }

}
