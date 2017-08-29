<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_question extends Model
{
    //修改表名
    public $table = 'question';

    // 取消时间戳
    public $timestamps = false;
}
