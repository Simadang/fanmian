<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sad_comment extends Model
{
    //修改表名
    public $table = 'comment';

    // 取消时间戳
    public $timestamps = false;
}
