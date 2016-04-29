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

//Route::get('/', 'WelcomeController@index');

Route::get('/', [
	'as'   => 'home',
	'uses' => 'HomeController@index'
]);

Route::get('/home', [
	'as'   => 'dashboard',
	'uses' => 'ArticlesController@index'
]);

Route::any('/search', [
	'as'   => 'search',
	'uses' => 'HomeController@search'
]);

/*===============================================*/
/*========== routing de page articles ========*/
/*===============================================*/

Route::group(['prefix' => '/articles'], function(){
	Route::get('/index', [
		'as'   => 'articles.index',
		'uses' => 'ArticlesController@index'
	]);

	Route::get('/create', [
		'as'   => 'articles.create',
		'uses' => 'HomeController@create'
	]);

	Route::post('/store', [
		'as'   => 'articles.store',
		'uses' => 'HomeController@store'
	]);

  	// route create comments

	Route::post('/comments', [
		'as'   => 'comments.store',
		'uses' => 'HomeController@storeComments'
	]);
	Route::get('/comments/{id}', [
		'as'   => 'comments.destroy',
		'uses' => 'ArticlesController@destroyComments'
	])->where('id', '[0-9]+');

	Route::get('/show/{id}', [
		'as'   => 'articles.show',
		'uses' => 'ArticlesController@show'
	])->where('id', '[0-9]+');

	Route::get('/edit/{id}', [
		'as'   => 'articles.edit',
		'uses' => 'ArticlesController@edit'
	])->where('id', '[0-9]+');

	Route::post('/update/{id}', [
		'as'   => 'articles.update',
		'uses' => 'ArticlesController@update'
	])->where('id', '[0-9]+');

	Route::get('/destroy/{id}', [
		'as'   => 'articles.destroy',
		'uses' => 'ArticlesController@destroy'
	])->where('id', '[0-9]+');

	// published action
	Route::get('/published/{id}', [
		'as'   => 'published.articles',
		'uses' => 'ArticlesController@published'
	])->where('id', '[0-9]+');

	Route::get('/published_off/{id}', [
		'as'   => 'published_off.articles',
		'uses' => 'ArticlesController@published_off'
	])->where('id', '[0-9]+');
});

/*===============================================*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
