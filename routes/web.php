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
// アイテム登録画面を表示
Route::get('/item/create', 'ItemController@newCreate')->name('create');
// アイテムを登録する
Route::post('/item/create', 'ItemController@store')->name('store');
// アイテム詳細画面を表示
Route::get('/item/show/{id}', 'ItemController@show')->name('show');
// アイテム編集画面を表示
Route::get('/item/edit/{id}', 'ItemController@edit')->name('edit');
// アイテム情報を更新する
Route::post('/item/update', 'ItemController@update')->name('update');
// アイテムを削除する
Route::post('/item/delete/{id}', 'ItemController@delete')->name('delete');
