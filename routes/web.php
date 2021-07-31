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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts','PostController');

Route::post('posts/confirm', 'PostController@confirm')->name('posts.confirm');

Route::post('posts/{id}/editconfirm', 'postcontroller@editconfirm')->name('posts.editconfirm');

Route::get('posts-search', 'PostController@search')->name('posts.search');

Route::get('posts-upload', 'PostController@upload')->name('posts.upload');

Route::resource('users','UserController');

Route::post('users/confirm', 'UserController@confirm')->name('users.confirm');

Route::post('users/{id}/editconfirm', 'UserController@editconfirm')->name('users.editconfirm');

Route::get('users-search', 'UserController@search')->name('users.search');

Route::get('importExportView', 'PostController@importExportView');
Route::get('export', 'PostController@export')->name('export');
Route::post('import', 'PostController@import')->name('import');