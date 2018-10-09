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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'user'],function(){
    Route::group(['prefix'=>'auth'],function(){
        //使用者註冊頁面
        Route::get('/sign-up','UserAuthController@signUpPage');
        //使用者資料新增
        Route::post('/sign-up','UserAuthController@signUpProcess');
    });
});

// test
Route::group(['prefix'=>'test'],function(){
    Route::get('/home','test\testController@home');
});
