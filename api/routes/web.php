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
Route::get('/visual', 'VisualController@list');
Route::get('/visual/add', 'VisualController@add');
Route::get('/visual/del/{uId}', 'VisualController@del');
Route::match(['get', 'post'], '/upload', 'Upload@upfile');