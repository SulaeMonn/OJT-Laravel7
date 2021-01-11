<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'PostController@index')->name('home');

Route::resource('posts', 'PostController');
Route::post('posts/confirm', 'PostController@confirm')->name('posts.confirm');
Route::post('posts/{id}/editConfirm', 'PostController@editConfirm')->name('posts.editConfirm');
Route::get('posts-search', 'PostController@search')->name('posts.search');
Route::get('posts-upload', 'PostController@upload')->name('posts.upload');
Route::get('importExportView', 'PostController@importExportView');
Route::get('export', 'PostController@export')->name('export');
Route::post('import', 'PostController@import')->name('import');

Route::resource('users', 'UserController');
Route::post('users/confirm', 'UserController@confirm')->name('users.confirm');
Route::post('users/{id}/editConfirm', 'UserController@editConfirm')->name('users.editConfirm');
Route::get('users-search', 'UserController@search')->name('users.search');
Route::get('users/{id}/show', 'UserController@show')->name('users.show');
Route::get('change-password/{id}', 'UserController@changePassword');
Route::post('change-password/{id}', 'UserController@passwordUpdate')->name('change.password');

Route::get('/email', 'EmailController@create');
Route::post('/email', 'EmailController@sendEmail')->name('send.email');

// test route for service_dao_structure
Route::get('/test', TestController::class . '@getList');
