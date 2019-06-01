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

Route::group(['namespace' => 'User'], function(){

    Route::get('/', 'HomeController@index')->name('user.home');

    Route::get('post/{post}', 'PostController@post')->name('post');

    Route::get('post/category/{category}', 'HomeController@category')->name('category');

    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function(){

    Route::get('admin/home', 'HomeController@index')->name('admin.home');

    Route::resource('admin/users', 'UserController');
    
    Route::resource('admin/posts', 'PostController');

    Route::resource('admin/roles', 'RoleController');

    Route::resource('admin/permissions', 'PermissionController');

    Route::resource('admin/tags', 'TagController');

    Route::resource('admin/categories', 'CategoryController');

});

Auth::routes();

