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
    return view('index');
});

Route::get('/classes', 'ClassesController@index')->name('classes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->group(function () {

	Route::get('/dashboard', 'MainController@index')->name('admin_dashboard');

	Route::get('/classes', 'ClassesController@index')->name('admin_classes');

	Route::get('/classes/add', 'ClassesController@add')->name('admin_add_class');

	Route::post('/classes/add', 'ClassesController@addClass')->name('admin_add_class');
});
