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
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::get('/user/author', 'UserController@author');
    Route::get('/user/unlock', 'UserController@unlock');
    Route::any('/captcha', 'CaptchaController@result');
    Route::any('/checkcaptcha', 'CaptchaController@check');
});

Route::get('/article', 'ArticleController@list');
Route::match(['get', 'post'], '/article/add', 'ArticleController@add');
Route::match(['get', 'post'], '/articles/{id}', 'ArticleController@info');
Route::match(['get', 'post'], '/download/article/{id}', 'ArticleController@download');

Route::get('/project', 'ProjectController@list');
Route::match(['get', 'post'], '/project/add', 'ProjectController@add');
Route::match(['get', 'post'], '/project/{id}', 'ProjectController@info');

Route::match(['get', 'post'], '/category/user/add', 'UserCategoryController@add');
Route::match(['get', 'post'], '/category/user', 'UserCategoryController@list');
Route::match(['get', 'post'], '/category/user/del/{id}', 'UserCategoryController@del');

Route::match(['get', 'post'], '/category/article/add', 'ArticleCategoryController@add');
Route::match(['get', 'post'], '/category/article', 'ArticleCategoryController@list');
Route::match(['get', 'post'], '/category/article/del/{id}', 'ArticleCategoryController@del');

Route::match(['get', 'post'], '/category/group/add', 'GroupCategoryController@add');
Route::match(['get', 'post'], '/category/group', 'GroupCategoryController@list');
Route::match(['get', 'post'], '/category/group/del/{id}', 'GroupCategoryController@del');


Route::match(['get', 'post'], '/setting/theme/add', 'ThemeController@add');
Route::match(['get', 'post'], '/setting/theme/set', 'ThemeController@setTheme');
Route::match(['get', 'post'], '/setting/theme/{name}', 'ThemeController@info');
Route::match(['get', 'post'], '/setting/theme', 'ThemeController@list');