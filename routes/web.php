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
    return view('home');
})->middleware('auth');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::prefix('tokens')->middleware('can:manage-token')->group(function () {
        Route::get('/', 'TokenController@index')->name('token.index');
        Route::post('create', 'TokenController@create')->name('token.create');
        Route::post('revoke/{id}', 'TokenController@revoke')->name('token.revoke');
    });   
    Route::prefix('users')->middleware('can:manage-user')->group(function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('show/{id}', 'UserController@show')->name('user.show');
        Route::post('update-permissions/{id}', 'UserController@updatePermissions')->name('user.update_permissions');
    });    
});

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

