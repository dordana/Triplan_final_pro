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
Route::get('/profile/{id}', ['as' => 'showuserprofile', 'uses' => 'UserController@userprofile_byid']);
Route::post('/deletefriend', ['as' => 'deletefriend', 'uses' => 'UserController@deletefriend_byid']);
Route::post('/addfavorite', ['as' => 'addfavorite', 'uses' => 'UserController@addfavorite']);
Route::post('/delfavorite', ['as' => 'delfavorite', 'uses' => 'UserController@delfavorite']);

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


// Attraction Routes
Route::get('/attractions', ['as' => 'showattractions', 'uses' => 'AttractionController@showAllAttractions']);
Route::get('/attractions/{id}', ['as' => 'showattraction', 'uses' => 'AttractionController@showAttraction']);
Route::post('/Attraction_addLike', ['as' => 'Attraction_addlike', 'uses' => 'AttractionController@addLike']);
Route::post('/Attraction_addQuestion', ['as' => 'Attraction_addquestion', 'uses' => 'AttractionController@addQuestion']);
Route::post('/Attraction_editQuestion', ['as' => 'Attraction_editquestion', 'uses' => 'AttractionController@editQuestion']);
Route::post('/Attraction_deleteQuestion', ['as' => 'Attraction_deletequestion', 'uses' => 'AttractionController@deleteQuestion']);
Route::post('/Attraction_addAnswerToQuestion', ['as' => 'Attraction_addanswertoquestion', 'uses' => 'AttractionController@addAnswerToQuestion']);

// Review Route
Route::get('/reviews', ['as' => 'showreviews', 'uses' => 'ReviewController@showallreviews']);
Route::get('/addreview', ['as' => 'addreviewpage', 'uses' => 'ReviewController@addreviewpage']);
Route::post('/addreview', ['as' => 'addreview', 'uses' => 'ReviewController@addreview']);
Route::get('/reviews/{review}', ['as' => 'show-review', 'uses' => 'ReviewController@showreview']);
Route::post('/reviews/rating', 'ReviewController@rating');

///General Routes
Route::get('/general/faq', ['as' => 'show-faq', 'uses' => 'HomeController@faq']);
Route::get('/general/contact', ['as' => 'show-contact', 'uses' => 'HomeController@contact']);
Route::get('/general/terms', ['as' => 'show-terms', 'uses' => 'HomeController@terms']);
Route::get('/general/partners', ['as' => 'show-partners', 'uses' => 'HomeController@partners']);
Route::get('/general/shareus', ['as' => 'show-shareus', 'uses' => 'HomeController@shareus']);
Route::get('/general/aboutus', ['as' => 'show-aboutus', 'uses' => 'HomeController@aboutus']);
Route::get('/404');
Route::post('/general/contact', ['as' => 'usermsg', 'uses' => 'HomeController@userMsgEmail']);

///Trip Routes
Route::get('/trip', 'TripController@initTrip');
Route::get('/tripbuilder', ['as' => 'tripbuilder', 'uses' => 'TripController@build']);
Route::get('/loading', ['as' => 'loading', 'uses' => 'TripController@loading']);
Route::post('/savetrip', ['as' => 'savetrip', 'uses' => 'TripController@saveTrip']);
Route::get('/downloadPDF', ['as' => 'downloadPDF', 'uses' => 'TripController@downloadPDF']);
Route::get('/sendEmail', ['as' => 'sendEmail', 'uses' => 'TripController@sendEmail']);
Route::get('/listView', ['as' => 'listView', 'uses' => 'TripController@listView']);
Route::get('/tripbuilderbudget', ['as' => 'tripbuilderbudget', 'uses' => 'TripController@buildbudget']);

// Admin Routes
Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/allusers', 'AdminController@showallusers');
Route::post('/admin/user/edit', 'AdminController@userEdit');
Route::post('/admin/user/inactive', 'AdminController@userInactive');
Route::post('/admin/user/active', 'AdminController@userActive');

Route::get('/test', 'HomeController@test');
