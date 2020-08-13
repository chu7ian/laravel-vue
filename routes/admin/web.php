<?php

// admin/...
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //登录界面
    Route::get('/login','EntryController@loginForm');
    //登录处理
    Route::post('/login','EntryController@login');
//    Route::get()->middleware('admin.auth'); //添加中间方式一：
    //后台主页
    Route::get('/index','EntryController@index');
    //退出登录
    Route::get('/logout','EntryController@logout');
    //修改密码界面
    Route::get('/changePassword','MyController@passwordForm');
    //密码处理
    Route::post('/changePassword','MyController@changePassword');
});
