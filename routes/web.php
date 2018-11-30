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
})->name('home');

Route::get('/classes', 'ClassesController@index')->name('classes');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function () {

	Route::get('/dashboard', 'MainController@index')->name('admin_dashboard');

	Route::get('/', function () {
		return redirect()->route('admin_dashboard');
	});
	//class
	Route::get('/classes/list', 'ClassesController@index')->name('admin_classes');

	Route::delete('classes/delete/{id}', 'ClassesController@delete')->name('admin_delete_class');

	Route::match(['get', 'post'], '/classes/create', 'ClassesController@create')->name('admin_create_class');

	Route::match(['get', 'post'], '/classes/edit/{id}', 'ClassesController@edit')->name('admin_edit_class');

	//category
	Route::get('/categories/list', 'CategoriesController@index')->name('admin_categories');

	Route::post('/categories/create', 'CategoriesController@create')->name('admin_category_create');

	Route::POST('/categories/load', 'CategoriesController@load')->name('admin_category_load');

	Route::post('/categories/update/{id}', 'CategoriesController@update')->name('admin_category_update');

	Route::delete('categories/delete/{id}', 'CategoriesController@delete')->name('admin_category_delete');

	// post
	Route::get('/posts/list', 'PostsController@index')->name('admin_posts');

	Route::match(['get', 'post'], '/posts/create', 'PostsController@create')->name('admin_create_post');

	Route::match(['get', 'post'], '/posts/edit/{id}', 'PostsController@edit')->name('admin_edit_post');

	Route::delete('posts/delete/{id}', 'PostsController@delete')->name('admin_post_delete');

});
