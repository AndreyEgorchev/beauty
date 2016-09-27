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


Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('profile/{id}/', 'Auth\ProfileController@getProfile');
$router->resource('profile','Auth\ProfileController');
$router->resource('specialists','SpecilistController');
Route::get('specialists/region','SpecilistController@getRegion');
Route::post('specialists/city_first','SpecilistController@getCity_first');
Route::post('specialists/city_second','SpecilistController@getCity_second');
Route::post('specialists/city_third','SpecilistController@getCity_third');
Route::post('specialists/{id}/city_first','SpecilistController@getCity_first');
Route::post('specialists/{id}/city_second','SpecilistController@getCity_second');
Route::post('specialists/{id}/city_third','SpecilistController@getCity_third');
Route::post('specialists/filter','SpecilistController@getFilter');
Route::post('specialists/city_filter','SpecilistController@getCity_filter');

