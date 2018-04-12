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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/upload', 'UploadController@index')->name('upload.index');

Route::post('/upload', 'UploadController@store')->name('upload.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
