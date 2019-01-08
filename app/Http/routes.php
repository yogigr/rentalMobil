<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home', 'uses' => 'PageController@index'
]);

Route::get('paket-sewa-mobil', [
    'as' => 'paket', 'uses' => 'PageController@paket'
]);

Route::get('prosedur-penyewaan', [
    'as' => 'prosedur', 'uses' => 'PageController@prosedur'
]);

Route::get('kontak-kami', [
    'as' => 'kontak', 'uses' => 'PageController@kontak'
]);

// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
	Route::get('dashboard', 'PageController@dashboard')->name('admin.dashboard');
	Route::resource('car', 'CarController');
	Route::resource('why', 'WhyController');
	Route::resource('how', 'HowController');

	//contact
	Route::get('contact', 'ContactController@index')->name('admin.contact');
	Route::patch('contact', 'ContactController@update')->name('admin.contact.update');

	//Pengguna
	Route::resource('user', 'UserController');

	//config
	Route::get('config', 'ConfigController@edit')->name('admin.config.edit');
	Route::patch('config', 'ConfigController@update')->name('admin.config.update');
});

