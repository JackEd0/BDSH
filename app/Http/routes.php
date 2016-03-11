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

//Route::get('/', ['as'=>'home', 'uses'=>'UtilisateursController@index']);
Route::get('/',['as'=>'home' ,'uses'=>'Controller@index']);

Route::get('utilisateurs/{email}', ['as'=>'utilisateurs.show', 'uses'=>'UtilisateursController@show']);
Route::get('utilisateurs', ['as'=>'utilisateurs.index', 'uses'=>'UtilisateursController@index']);
Route::get('posts/{slug}', ['as'=>'posts.show', 'uses'=>'PostsController@show']);
Route::get('posts', ['as'=>'posts.index', 'uses'=>'PostsController@index']);

Route::get('shs', ['as'=>'shs.shs', 'uses'=>'Controller@shs']);
Route::get('shsSearch', ['as'=>'shs.search', 'uses'=>'Controller@shsSearch']);
Route::get('auth', ['as'=>'auth', 'uses'=>'Controller@auth']);
Route::get('signup', ['as'=>'signup', 'uses'=>'Controller@signup']);
Route::get('usersList', ['as'=>'shs.usersList', 'uses'=>'Controller@usersList']);
Route::get('usersList/{email}', ['as'=>'shs.usersEdit', 'uses'=>'Controller@usersEdit']);

Route::get('login', ['as'=>'users.login', 'uses'=>'UserController@login']);
Route::post('check', ['as'=>'users.check', 'uses'=>'UserController@check']);
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
