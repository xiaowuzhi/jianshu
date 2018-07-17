<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller {
    //登录页面
    public function index() {
        return view('login.index');
    }

    //登录行为
    public function login() {
        //验证
//        $this->validate(request(), [
//            'email' =>'required|email',
//            'password' => 'required|min:5|max:10',
//            'is_remember' => 'integer',
//        ]);

        $vva = Validator::make(request()->all(),[
            'email' =>'required|email',
            'password' => 'required|min:5|max:10',
            'is_remember' => 'integer',
        ]);

        //print_r($vva->fails());
        //exit();
        //print_r($vva);
        if ($vva->fails()) {
            return redirect('/login')
                ->withErrors($vva)
                ->withInput();
        }

        //逻辑
        $user = request(['email', 'password']);
        $is_remember = boolval(request('is_remember'));
        if(\Auth::attempt($user, $is_remember)){
            return redirect('/posts');
        }
        //渲染
        return \Redirect::back()->withErrors('邮箱密码不匹配');
    }

    //登出行为
    public function logout() {
        \Auth::logout();
        return redirect('/login');

    }

    public function welcome(){
        return redirect('/posts');
    }
}




















