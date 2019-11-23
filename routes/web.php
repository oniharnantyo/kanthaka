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


Route::group(['prefix' => '/'], function ($router) {
  Route::get('/', 'HomeController@index');
  Route::get('/tentang-kami', 'HomeController@tentangPage');
  Route::get('/program-kerja', 'HomeController@programKerjPage');
  Route::get('/blog', 'BlogController@index');
});


Route::get('/login', 'LoginController@getLogin');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');;

//Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function ($router) {
  Route::get('/', function (){
    return redirect('/admin/dashboard');
  });
  Route::post('/logout', 'portal\UserController@logout');
  Route::get('/dashboard', 'portal\DashboardController@index');

  Route::get('/blog', 'portal\BlogController@index');
  Route::get('/blog/list', 'portal\BlogController@list');
  Route::get('/blog/create', 'portal\BlogController@create');
  Route::post('/blog/create', 'portal\BlogController@createPost');
  Route::get('/blog/{id}', 'portal\BlogController@detail');
  Route::post('/blog/{id}', 'portal\BlogController@update');


  Route::get('/banner', 'portal\BannerController@index');
  Route::get('/banner/list', 'portal\BannerController@list');
  Route::get('/banner/create', 'portal\BannerController@create');
  Route::post('/banner/create', 'portal\BannerController@createPost');
  Route::get('/banner/{id}', 'portal\BannerController@detail');
  Route::post('/banner/{id}', 'portal\BannerController@update');
});
