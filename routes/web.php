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

Route::get('/', 'BookController@index')->name('book.index');
Route::get('/{id}', 'BookController@detail')->name('book.detail')->where('id', '[0-9]+');
Route::get('/book/create/{id?}', 'BookController@create')->name('book.create');
Route::post('/book/store', 'BookController@store')->name('book.store');
Route::put('/book/update/{id}', 'BookController@update')->name('book.update');

Auth::routes();
