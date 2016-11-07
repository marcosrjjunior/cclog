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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/{ownerName}/{repoName}', ['as' => 'owner.repo.logs', 'uses' => 'HomeController@logs']);

Route::post('/project/create',  ['as' => 'project.create', 'uses' => 'HomeController@projectCreate']);
Route::post('/user/create',  ['as' => 'user.create', 'uses' => 'UserController@create']);
Route::post('/user/update',  ['as' => 'user.update', 'uses' => 'UserController@update']);
