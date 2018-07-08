<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//用户模块
//注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
//注册行为
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
//登录页面
Route::get('/login', '\App\Http\Controllers\LoginController@index');
//登录行为
Route::post('/login', '\App\Http\Controllers\LoginController@login');
//登出行为
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');
//个人设置页面
Route::get('/user/me/setting', '\App\Http\Controllers\UserController@setting');
//个人设置操作
Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');


Route::group([], function(){
    // 文章
    Route::get('/posts', '\App\Http\Controllers\PostController@index');
    Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
    Route::post('/posts', '\App\Http\Controllers\PostController@store');
    Route::get('/posts/search', '\App\Http\Controllers\PostController@search');
    Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
    Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
    Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
    Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
    Route::post('/posts/img/upload', '\App\Http\Controllers\PostController@imageUpload');
    Route::post('/posts/comment', '\App\Http\Controllers\PostController@comment');
    Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
    Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');


});
