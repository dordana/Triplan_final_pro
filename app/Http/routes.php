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

///General Routes
Route::get('/general/terms', ['as' => 'show-terms', 'uses' => 'HomeController@terms']);

///Trip Routes
Route::get('/trip', 'TripController@initTrip');
