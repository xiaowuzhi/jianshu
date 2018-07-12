<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    //登录页面
    public function index() {
        return view('/admin/user/index');
    }

    //管理员创建页面
    public function create() {
        return view('/admin/user/add');
    }

    //创建操作
    public function store() {
        return;
    }
}