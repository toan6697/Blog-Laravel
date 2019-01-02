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

      // post
      Route::get('/post/create','postController@create')->name('post-create');
      Route::post('/post/add','postController@add')->name('post-add');

      Route::get('/post/index','postController@index')->name('post-index');

      Route::get('/post/delete/{id}','postController@delete')->name('post-delete');

      Route::get('/post/edit/{id}','postController@edit')->name('post-edit');
      Route::post('/post/update','postController@update')->name('post-update');
    
      //category
      Route::get('/category/index','categoryController@index')->name('category-index');

      Route::get('/category/create','categoryController@create')->name('category-create');
      Route::post('/category/add','categoryController@add')->name('category-add');

      Route::post('/category/delete','categoryController@delete')->name('category-delete');
      
      Route::post('/category/edit','categoryController@edit')->name('category-edit');
      Route::post('/category/update','categoryController@update')->name('category-update');

      //tag
      Route::get('/tag/create','tagController@create')->name('tag-create');
      Route::post('/tag/add','tagController@add')->name('tag-add');

      Route::get('/tag/index','tagController@index')->name('tag-index');

      Route::get('/tag/delete/{id}','tagController@delete')->name('tag-delete');

      Route::get('/tag/edit/{id}','tagController@edit')->name('tag-edit');
      Route::post('/tag/update','tagController@update')->name('tag-update');
});
