<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable {
    public $fillable = [
        'name', 'email', 'password'
    ];
}
