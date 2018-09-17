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

Route::get('/hub', 'HubAuth\LoginController@showLoginForm')->name('login');
Route::get('/commutter', 'CommutterAuth\LoginController@showLoginForm')->name('login');


Route::group(['prefix' => 'hub'], function () {
  Route::get('/login', 'HubAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'HubAuth\LoginController@login');
  Route::post('/logout', 'HubAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'HubAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'HubAuth\RegisterController@register');

  Route::post('/password/email', 'HubAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'HubAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'HubAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'HubAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'commutter'], function () {
  Route::get('/login', 'CommutterAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CommutterAuth\LoginController@login');
  Route::post('/logout', 'CommutterAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CommutterAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CommutterAuth\RegisterController@register');

  Route::post('/password/email', 'CommutterAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CommutterAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CommutterAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CommutterAuth\ResetPasswordController@showResetForm');
});
