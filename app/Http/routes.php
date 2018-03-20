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

Route::auth();
Route::get('/', 'HomeController@index');

Route::get('auth/facebook', ['as' => 'facebook', 'uses' => 'Auth\AuthController@redirectToProvider'] );
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/google', ['as' => 'google', 'uses' => 'Auth\AuthController@redirectToProviderGoogle'] );
Route::get('auth/google/callback', 'Auth\AuthController@handleProviderCallbackGoogle');

Route::get('auth/twitter', 'Auth\AuthController@redirectToProviderTwitter');
Route::get('auth/twitter/callback', 'Auth\AuthController@handleProviderCallbackTwitter');

///User Routes
Route::get('/profile', 'UserController@showprofile');
Route::post('/profile', 'UserController@udpateprofile');
Route::post('/profile/changepassword', ['as' => 'change-password', 'uses' => 'UserController@changepassword']);
Route::post('/profile/changephoto', ['as' => 'change-photo', 'uses' => 'UserController@changephoto']);

///Country Routes
Route::get('/countries', ['as' => 'showcountries', 'uses' => 'CountryController@showallcountries']);
Route::get('/country/{country}', ['as' => 'show-countrydetalis', 'uses' => 'CountryController@showcountry']);
Route::get('/getCities','CountryController@getCitiesByCountry');
Route::post('/addLike', ['as' => 'addlike', 'uses' => 'CountryController@addLike']);
Route::post('/addQuestion', ['as' => 'addquestion', 'uses' => 'CountryController@addQuestion']);
Route::post('/editQuestion', ['as' => 'editquestion', 'uses' => 'CountryController@addQuestion']);
Route::post('/deleteQuestion', ['as' => 'deletequestion', 'uses' => 'CountryController@deleteQuestion']);
Route::post('/addAnswerToQuestion', ['as' => 'addanswertoquestion', 'uses' => 'CountryController@addAnswerToQuestion']);


// City Routes
Route::get('/cities', ['as' => 'showcities', 'uses' => 'CitiesController@showcities']);
Route::get('/cities/{city}', ['as' => 'show-citydetalis', 'uses' => 'CitiesController@showcity']);
Route::post('/City_addLike', ['as' => 'City_addlike', 'uses' => 'CitiesController@addLike']);
Route::post('/City_addQuestion', ['as' => 'City_addquestion', 'uses' => 'CitiesController@addQuestion']);
Route::post('/City_editQuestion', ['as' => 'City_editquestion', 'uses' => 'CitiesController@editQuestion']);
Route::post('/City_deleteQuestion', ['as' => 'City_deletequestion', 'uses' => 'CitiesController@deleteQuestion']);
Route::post('/City_addAnswerToQuestion', ['as' => 'City_addanswertoquestion', 'uses' => 'CitiesController@addAnswerToQuestion']);

///General Routes
Route::get('/general/terms', ['as' => 'show-terms', 'uses' => 'HomeController@terms']);
Route::get('/404');

///Trip Routes
Route::get('/trip', 'TripController@initTrip');
Route::get('/tripbuilder', ['as' => 'tripbuilder', 'uses' => 'TripController@build']);