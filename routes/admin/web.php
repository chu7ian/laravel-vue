<?php

// admin/...
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    //登录界面
    Route::get('/login','EntryController@loginForm');
    //登录处理
    Route::post('/login','EntryController@login');

    //添加中间方式一：
//    Route::get('/index','EntryController@index')->middleware('admin.auth');
    //后台主页
    Route::get('/index','EntryController@index');

    //退出登录
    Route::get('/logout','EntryController@logout');

    //修改密码界面
    Route::get('/changePassword','MyController@passwordForm');
    Route::post('/changePassword','MyController@changePassword');
});
