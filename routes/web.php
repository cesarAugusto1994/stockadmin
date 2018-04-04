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

Auth::routes();






Route::middleware('auth')->middleware('check_code')->group(function () {
  Route::get('/', 'HomeController@index');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/profile', 'UserController@show')->name('profile');
  Route::get('/configurations', 'ConfigController@index')->name('configs');

  Route::get('/categories', 'CategoriasController@index');
});

Route::middleware('auth')->group(function () {
  Route::post('/configurations/app_id/store', 'ConfigController@saveAppCode')->name('save_app_code');
  Route::get('/configurations/notification', 'ConfigController@notification')->name('notification');
  Route::get('/autentication/grant-access', 'ConfigController@requestApiAccessCode')->name('request_api_acesss_code');

});
