<?php

// admin/...
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::get('/login','EntryController@loginForm');
    Route::post('/login','EntryController@login');

    //添加中间方式一：
//    Route::get('/index','EntryController@index')->middleware('admin.auth');
    Route::get('/index','EntryController@index');
});
