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


// Route::get('/test',function(){
// 	return dd(App\postModel::find(1)->category()->get()->toArray());
// });
Route::get('/', 'frontendController@index');

Route::post('/subscribe',function(){
	$email=request('email');
	Newsletter::subscribe($email);

    Session::flash('subscribed','Successfully subscribed');
	return redirect()->back();
});

Auth::routes();

Route::get('post/{slug}', 'frontendController@postSingle')->name('single');
Route::get('category/{id}', 'frontendController@category')->name('category');
Route::get('tag/{id}','frontendController@tag')->name('tag');
Route::get('search','frontendController@search')->name('search');


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

      //user
      Route::get('user/index','userController@index')->name('user-index');

      Route::get('/user/create','userController@create')->name('user-create');
      Route::post('/user/add','userController@add')->name('user-add');

      Route::get('/user/delete/{id}','userController@delete')->name('user-delete');
      
      //phân quyền
      Route::get('/user/updatePermission','userController@updatePermission')->name('user-admin');

      //profile update
      Route::get('/user/profile-edit','profileController@edit')->name('profile-edit');
      Route::post('/user/profile-update','profileController@update')->name('profile-update');
   
      //setting
      Route::get('/setting/index','SettingsController@index')->name('setting-index');
      Route::post('/setting/update','SettingsController@update')->name('setting-update');

});
