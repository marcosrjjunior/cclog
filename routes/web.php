<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/github', ['as' => 'a.github', 'uses' => 'GithubController@redirectToProvider']);
Route::get('/auth/github/callback', 'GithubController@handleProviderCallback');

Auth::routes();

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

// Repos
Route::get('/{ownerName}/{repoName}', ['as' => 'owner.repo.logs', 'uses' => 'HomeController@logs']);

Route::post('/project/create',  ['as' => 'project.create', 'uses' => 'HomeController@projectCreate']);
Route::delete('/project/delete',  ['as' => 'project.delete', 'uses' => 'HomeController@projectDelete']);

Route::post('/user/create',  ['as' => 'user.create', 'uses' => 'UserController@create']);
Route::post('/user/update',  ['as' => 'user.update', 'uses' => 'UserController@update']);

Route::post('/report/create',  ['as' => 'report.create', 'uses' => 'HomeController@reportCreate']);