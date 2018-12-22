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

Auth::routes();


// 'middleware'=>'auth' dùng để ktra user đã đăng nhập hay chưa
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

      Route::get('/home', 'HomeController@index')->name('home');


      Route::get('/post/create','postController@create')->name('post-create');
      Route::post('/post/add','postController@add')->name('post-add');
});
