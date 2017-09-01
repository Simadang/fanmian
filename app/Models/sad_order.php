<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_order extends Model
{
    //修改表名
    public $table = 'order';

    // 取消时间戳
    public $timestamps = false;
}
