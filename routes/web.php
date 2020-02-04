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

Route::group(['namespace' => 'Admin'], function(){

    // Authentication Routes...
    Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin_login');
    Route::post('admin/login', 'Auth\LoginController@login');
    //Route::post('admin/login-custom', 'LoginCustomController@credentials')->name('admin_login_custom');
    
    Route::post('admin/logout', 'Auth\LoginController@logout', function(){
    	return abort(404);
    })->name('admin_logout');

	Route::get('admin/home', 'HomeController@index')->name('admin_home');
	Route::resource('admin/permission', 'PermissionController');
	// User Client
	Route::resource('admin/user', 'UserController'); 
	// User Admin
	Route::resource('admin/admin', 'AdminController');
	Route::resource('admin/task', 'TaskController');
});

Route::get('/home', 'HomeController@index')->name('home');
