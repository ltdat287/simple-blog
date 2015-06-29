<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');

Route::get('/articles',
    [
        'as' => 'article.index',
        'uses' => 'ArticlesControl@index'
    ]);

post('/articles',
    [
        'as'=>'article.store',
        'uses'=>'ArticlesControl@store'
    ]);

Route::get('/articles/create',
    [
        'as' => 'article.create',
        'uses' => 'ArticlesControl@create'
    ]);

get('/articles/{id}/edit',
    [
        'as' => 'article.edit',
        'uses' => 'ArticlesControl@edit'
    ]);

put('/articles/{id}',
    [
        'as' => 'article.update',
        'uses' => 'ArticlesControl@update'
    ]);

Route::get('/articles/{id}',
    [
        'as' => 'article.show',
        'uses' => 'ArticlesControl@show'
    ]);