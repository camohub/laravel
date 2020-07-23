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

Route::match(['GET','POST'], '/', 'BookController@index')->name('book.index');
//Route::get('/{id}', 'BookController@detail')->name('book.detail')->where('id', '[0-9]+');
Route::get('/{slug}', 'BookController@detail')->name('book.detail');
Route::get('/book/create/{id?}', 'BookController@create')->name('book.create')->where('id', '[0-9]+');
Route::post('/book/store', 'BookController@store')->name('book.store');
Route::put('/book/update/{id}', 'BookController@update')->name('book.update')->where('id', '[0-9]+');

Auth::routes();
