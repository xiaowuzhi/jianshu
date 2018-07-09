<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Model;

class Comment extends Model {
    //评论所属反向
    public function post(){
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    //关联用户
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
