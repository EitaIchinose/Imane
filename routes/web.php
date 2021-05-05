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
// アイテム一覧をトップス表示のみに切り替え
Route::get('/item/tops', 'CategoryController@index_tops')->name('tops');
// アイテム一覧をアウター表示のみに切り替え
Route::get('/item/outer', 'CategoryController@index_outer')->name('outer');
// アイテム一覧をインナー表示のみに切り替え
Route::get('/item/inner', 'CategoryController@index_inner')->name('inner');
// アイテム一覧をボトムス表示のみに切り替え
Route::get('/item/bottoms', 'CategoryController@index_bottoms')->name('bottoms');
// アイテム一覧をシューズ表示のみに切り替え
Route::get('/item/shoes', 'CategoryController@index_shoes')->name('shoes');
// アイテム一覧をビジネス表示のみに切り替え
Route::get('/item/business', 'CategoryController@index_business')->name('business');
