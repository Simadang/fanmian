<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_chat extends Model
{
    //修改表名
    public $table = 'chat';

    // 取消时间戳
    public $timestamps = false;
}
