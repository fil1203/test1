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

Route::get('/', 'GoodsController@index')->name('welcome');
Route::get('/ajax','GoodsController@ajaxSize')->name('ajax');
Route::get('/goods/{id}','GoodsController@show')->name('product');
Route::match(['get','post'],'/create','GoodsController@create')->name('create');
Route::match(['get','post'],'/edit/{id}','GoodsController@edit')->name('edit');
