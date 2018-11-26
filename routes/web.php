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

Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function () {

	Route::get('/dashboard', 'MainController@index')->name('admin_dashboard');

	Route::get('/', function () {
		return redirect()->route('admin_dashboard');
	});

	Route::get('/classes', 'ClassesController@index')->name('admin_classes');

	Route::delete('classes/delete/{id}', 'ClassesController@delete')->name('admin_delete_class');

	Route::match(['get', 'post'], '/classes/create', 'ClassesController@create')->name('admin_create_class');

	Route::match(['get', 'post'], '/classes/edit/{id}', 'ClassesController@edit')->name('admin_edit_class');

	Route::get('/categories', 'CategoriesController@index')->name('admin_category');

});
