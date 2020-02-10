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

Route::redirect('/', '/login');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('home', 'HomeController@index')->name('home');
Route::get('workfromhome_response', 'HomeController@workfromhomeResponse')->name('workfromhome_update');
Route::get('user_task_index/{user_id}', 'HomeController@userTaskIndex')->where('user_id', '[0-9]+')->name('user_task');
Route::post('user_task_store', 'HomeController@userTaskStore')->name('user_task_store');


Route::post('logout', 'Auth\LoginController@logout', function(){
    return abort(404);
})->name('logout');

// User Client/Admin
Route::resource('user', 'UserController');
Route::resource('workfromhome', 'WorkfromhomeController');
Route::resource('task', 'TaskController');


Auth::routes();