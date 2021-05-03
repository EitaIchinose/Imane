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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// トップ画面を表示
Route::get('/', 'ItemController@index')->name('index');
Route::get('/item/create', 'ItemController@newCreate')->name('create');
Route::post('/item/create', 'ItemController@store')->name('store');
Route::post('/item/confirm', 'ItemController@confirm')->name('confirm');
