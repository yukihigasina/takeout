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

/*Route::group(['prefix'=>'admin'],function(){
    Route::get('post/create','Admin\PostController@create')->middleware('auth');
    Route::post('post/create', 'Admin\PostController@store')->middleware('auth');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/post', 'Admin\PostController')->middleware('auth');



Route::get('/', 'PostController@index');
Route::get('/{storename}', 'PostController@show')->name('show');

// Route::delete('admin/post/{id}', 'Admin\PostController@destroy')->name('destroy');


/*
Route::get('admin/post/{id}', 'Admin\PostController@edit')->name('edit'); 
*/