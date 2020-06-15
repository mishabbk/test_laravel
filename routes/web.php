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

Route::get('/', 'ClientController@index')->name('index');
Route::get('/create', 'ClientController@create')->name('create');
Route::post('/store', 'ClientController@store')->name('store');
Route::get('/{client}/edit', 'ClientController@edit')->name('edit');
Route::put('/{client}', 'ClientController@update')->name('update');
