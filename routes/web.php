<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'DashboardController@index')->name('home');
Route::get('/login', 'AccessController@showLogin')->name('showLogin');
Route::post('/', 'AccessController@login')->name('login');
Route::get('/logout', 'AccessController@logout')->name('logout');
Route::post('login', 'AccessController@forgetPassword')->name('forgetPassword');

Route::group(['prefix' => 'roles'], function(){
	Route::get('/', 'RolController@index')->name('roles.index');
	Route::get('nuevo', 'RolController@create')->name('roles.create');
	Route::post('/', 'RolController@store')->name('roles.store');
    Route::get('{name}/editar', 'RolController@edit')->name('roles.edit');
    Route::put('{id}', 'RolController@update')->name('roles.update');
    Route::delete('{id}', 'RolController@destroy')->name('roles.destroy');
});

Route::group(['prefix'=>'usuarios'], function(){
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('nuevo', 'UserController@create')->name('users.create');
    Route::post('/', 'UserController@store')->name('users.store');
    Route::get('{username}/editar', 'UserController@edit')->name('users.edit');
    Route::put('{id}', 'UserController@update')->name('users.update');
    Route::delete('{id}', 'UserController@destroy')->name('users.destroy');
});

Route::group(['prefix'=>'resetpassword'], function(){
    Route::post('/', 'PassResetsController@forgotpassword')->name('forgotPassword');
    Route::get('{id}/recuperar', 'PassResetsController@index')->name('passreset.index');
    Route::put('{id}', 'PassResetsController@store')->name('passreset.store');
});

Route::group(['prefix'=>'categorias'], function(){
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('nueva', 'CategoryController@create')->name('categories.create');
    Route::post('/', 'CategoryController@store')->name('categories.store');
    Route::get('{url}/editar', 'CategoryController@edit')->name('categories.edit');
    Route::put('{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('{id}', 'CategoryController@destroy')->name('categories.destroy');
});

Route::group(['prefix'=>'cursos'], function(){
    Route::get('/', 'CourseController@index')->name('courses.index');
    Route::get('nuevo', 'CourseController@create')->name('courses.create');
    Route::post('/', 'CourseController@store')->name('courses.store');
    Route::get('{url}/editar', 'CourseController@edit')->name('courses.edit');
    Route::put('{id}', 'CourseController@update')->name('courses.update');
    Route::delete('{id}', 'CourseController@destroy')->name('courses.destroy');

    Route::group(['prefix'=>'{course_url}/etapas'], function(){
        Route::get('/', 'StageController@index')->name('stages.index');
        Route::get('nueva', 'StageController@create')->name('stages.create');
        Route::post('/', 'StageController@store')->name('stages.store');
        Route::get('{url}/editar', 'StageController@edit')->name('stages.edit');
        Route::put('{id}', 'StageController@update')->name('stages.update');
        Route::delete('{id}', 'StageController@destroy')->name('stages.destroy');

        Route::group(['prefix'=>'{stage_url}/items'], function(){
            Route::get('/', 'ItemController@index')->name('items.index');
            Route::get('nuevo', 'ItemController@create')->name('items.create');
            Route::post('/', 'ItemController@store')->name('items.store');
            Route::get('{url}/editar', 'ItemController@edit')->name('items.edit');
            Route::put('{id}', 'ItemController@update')->name('items.update');
            Route::delete('{id}', 'ItemController@destroy')->name('items.destroy');
        });
    });
});