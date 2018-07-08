<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

// 表 => posts
class Model extends BaseModel {
    //protected $table = "posts2";
//    protected  $guarded; //不可以注入的字段
//    protected $fillable; // 可以注入数据字段
    protected $guarded = [];
}
