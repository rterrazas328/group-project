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

Route::get('/', 'GuestController@index');

Route::get('home', 'UserController@index');

Route::get('profile','UserController@getProfile');
Route::post('saveprofile','UserController@saveProfile');
Route::post('saveprofilepic','UserController@savePicture');
Route::post('saveaboutme','UserController@saveAboutMe');


Route::get('admin','AdminController@adminPage');
Route::post('admin', 'AdminController@updateRoles');

Route::get('tracks', 'MusicController@getTracks');
Route::get('playlists', 'MusicController@getPlaylists');
Route::get('createplaylist', 'MusicController@getCreatePlaylist');

Route::get('username', 'GuestController@getUserName');
Route::post('username', 'GuestController@postUserName');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
