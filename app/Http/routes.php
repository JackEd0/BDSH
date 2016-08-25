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

    Route::auth();
    Route::get('users/activation/{id}', 'Auth\AuthController@activateUser')->name('user.activate');

    Route::get('/home', 'Controller@shsHome');

    Route::get('/', ['as' => 'home', 'uses' => 'Controller@index']);

    Route::get('profile/{id}', ['as' => 'users.profile', 'uses' => 'UserController@userProfile']);
    Route::get('userseditaccess/{id}', ['as' => 'users.editAccess', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'UserController@editUserAccess']);
    Route::get('users', ['as' => 'users.list', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'UserController@userList']);
    Route::post('editProfile/{id}', ['as' => 'updateProfile', 'uses' => 'UserController@updateProfile']);
    Route::post('editPassword/{id}', ['as' => 'updatePassword', 'uses' => 'UserController@updatePassword']);

    Route::post('editUserType/{id}', ['as' => 'editUserType', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'UserController@editUserType']);
    Route::get('deactivateUser/{id}', ['as' => 'user.deactivate', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'UserController@deactivateUser']);

    Route::get('search', ['as' => 'search.searchCard',  'uses' => 'SearchController@searchCard']);

    Route::get('addCard', ['as' => 'cards.add', 'middleware' => ['auth', 'verify.access.permission:2'], 'uses' => 'CardController@addCard']);
    Route::post('search', ['as' => 'cards.create', 'middleware' => ['auth', 'verify.access.permission:2'], 'uses' => 'CardController@create']);
    Route::get('getCardTypeAttribute/{cardTypeId}', ['as' => 'cards.getCardTypeAttribute', 'middleware' => ['auth', 'verify.access.permission:2'], 'uses' => 'CardController@getCardTypeAttribute']);
    Route::get('cards/edit/{id}', ['as' => 'cards.edit', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@goToCardEditView']);
    Route::post('cards/update/{id}', ['as' => 'updateCard', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@updateCard']);
    Route::post('addDoc', ['as' => 'cards.addDoc', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@addDoc']);
    Route::get('cards/view/{id}', ['as' => 'cards.view', 'middleware' => ['auth', 'verify.access.permission:4'], 'uses' => 'CardController@goToCardView']);
    Route::get('addCardAttribute', ['as' => 'cards.addAttribute', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@addCardAttribute']);
    Route::post('addCardAttribute', ['as' => 'createCardAttribute', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@createCardAttribute']);

    Route::get('importDocument', ['as' => 'document.import', 'uses' => 'DocumentController@importDocuments']);
    
    Route::get('shs', ['as' => 'shs.home', 'uses' => 'Controller@shsHome']);
    Route::get('shsSearch', ['as' => 'shs.search', 'uses' => 'Controller@shsSearch']);

});
