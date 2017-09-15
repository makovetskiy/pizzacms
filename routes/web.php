<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});

Route::group(['prefix'=>'admin','middleware' => 'admin','namespace' => 'Admin'], function()
{
    Route::get('/admin', 'AdminController@index');
    Route::post('articles/{id}','ArticlesController@update');
    Route::resource('articles','ArticlesController');
    Route::resource('pages','PagesController');
    Route::resource('articlecategories','ArticleCategoriesController');
    
});

Route::get('news',"NewsController@index");
Route::get('news/{id}','NewsController@show');

Route::get('/admin', 'Admin\AdminController@index');
Auth::routes();


Route::get('/home', 'HomeController@index');
