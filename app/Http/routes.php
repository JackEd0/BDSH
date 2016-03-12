<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home' ,'uses'=>'Controller@index']);

Route::get('users', ['as'=>'users.list', 'uses'=>'UserController@listAll']);
Route::get('users/{email}', ['as'=>'users.edit', 'uses'=>'UserController@edit']);
Route::get('login', ['as'=>'users.login', 'uses'=>'UserController@login']);
Route::get('signUp', ['as'=>'users.signUp', 'uses'=>'UserController@signUp']);
Route::post('check', ['as'=>'users.check', 'uses'=>'UserController@check']);

Route::get('shs', ['as'=>'shs.home', 'uses'=>'Controller@shsHome']);
Route::get('shsSearch', ['as'=>'shs.search', 'uses'=>'Controller@shsSearch']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
