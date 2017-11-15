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
Route::get('/visual/detail/{uId}', 'VisualController@detail');
Route::match(['get', 'post'], '/upload', 'Upload@upfile');
Route::match(['get', 'post'], '/delfile/{file}', 'Upload@delfile');
Route::match(['get', 'post'], '/upload/base64', 'Upload@base64');
Route::get('/download/{uId}/{name}/{file}/{size}', 'Upload@downfile');

Route::get('/category/add', 'CategoryController@add');
Route::get('/category/parent', 'CategoryController@parentlist');
Route::get('/category/child/{tag}', 'CategoryController@childlist');
Route::get('/category/edit/{uId}', 'CategoryController@edit');
Route::get('/category/del/{uId}', 'CategoryController@del');
Route::get('/navigation', 'CategoryController@nav');
Route::get('/navigation/parent', 'CategoryController@parent');
Route::get('/navigation/children/{tag}', 'CategoryController@children');

Route::group(['middleware' => ['web']], function () {
    Route::get('/user/add', 'UserController@add');
    Route::get('/user/author', 'UserController@author');
    Route::any('/captcha', 'CaptchaController@result');
    Route::any('/checkcaptcha', 'CaptchaController@check');
});