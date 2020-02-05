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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin_login');
Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout', function(){
    return abort(404);
})->name('admin_logout');

// User Client/Admin
Route::resource('user', 'UserController'); 
Route::resource('task', 'TaskController');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
