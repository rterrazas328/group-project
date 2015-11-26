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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('editprofile','HomeController@editProfile');
Route::post('saveprofile','HomeController@saveProfile');
Route::post('saveprofilepic','HomeController@savePicture');
Route::post('saveaboutme','HomeController@saveAboutMe');

Route::get('admin','AdminController@adminPage');
Route::post('admin', 'AdminController@updateRoles');

Route::get('username', 'UsernameController@getIndex');
Route::post('username', 'UsernameController@postIndex');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
