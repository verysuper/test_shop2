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

// Route::get('/', function () {
//     return view('welcome');
// });
// 首頁
Route::get('/', 'MerchandiseController@indexPage');

Route::group(['prefix'=>'user'],function(){
    Route::group(['prefix'=>'auth'],function(){
        //使用者註冊頁面
        Route::get('/sign-up','UserAuthController@signUpPage');
        //使用者資料新增
        Route::post('/sign-up','UserAuthController@signUpProcess');
        //使用者資料登入
        Route::get('/sign-in', 'UserAuthController@signInPage');
        Route::post('/sign-in', 'UserAuthController@signInProcess');
        //使用者資料登出
        Route::get('/sign-out', 'UserAuthController@signOut');
    });
});
// 商品
Route::group(['prefix' => 'merchandise'], function(){
    Route::get('/', 'MerchandiseController@merchandiseListPage');//session 1

    Route::get('/create', 'MerchandiseController@merchandiseCreateProcess'); //session 2
        // ->middleware(['user.auth.admin']);
    // 指定商品
    Route::group(['prefix' => '{merchandise_id}'], function(){
        // Route::get('/', 'MerchandiseController@merchandiseItemPage')
        //     ->where([
        //         'merchandise_id' => '[0-9]+',
        //     ]);

        // Route::group(['middleware' => ['user.auth.admin']], function(){
            Route::get('/edit', 'MerchandiseController@merchandiseItemEditPage');
            Route::put('/', 'MerchandiseController@merchandiseItemUpdateProcess');
        // });

        // Route::post('/buy', 'MerchandiseController@merchandiseItemBuyProcess')
        //     ->middleware(['user.auth']);
    });
});

// test
Route::group(['prefix'=>'test'],function(){
    Route::get('/home','test\testController@home');
});
