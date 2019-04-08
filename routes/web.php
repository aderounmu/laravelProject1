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


/*
Route::get('/hello', function () {
   return 'hello world';
   
});
 

Route::get('/users/{name}/{id}', function ($name, $id) {
   return 'this is  '. $name .' with an id of '.$id;
});
*/ 
Route::get('about', 'PagesController@about');
Route::get('', 'PagesController@index');
Route::get('services', 'PagesController@services');


// Route::resource('posts', 'PostsController');


Route::get('post/destroy/{post}','PostsController@destroy')->name('posts.destroy');

Route::resource('posts', 'PostsController')->except([
      'destroy'
   ]);
Auth::routes();

Route::get('society/club/{age}','DashboardController@sociteyIndex')->name('society.index')->middleware('checkage');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
