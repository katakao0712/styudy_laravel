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

// 

Route::get('/','WelcomeController@index');
Route::get('contact', 'WelcomeController@contact');
Route::get('about', 'PagesController@about');
Route::get('articles', 'ArticlesController@index');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{id}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');
Route::get('articles/pop', 'ArticlesController@pop1');
Route::get('articles/{id}/edit', 'ArticlesController@edit');  // 追加
Route::patch('articles/{id}', 'ArticlesController@update');  // 追加
Route::delete('articles/{id}', 'ArticlesController@destroy'); 