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

use App\Services\API\GoogleMaps;

Route::group(['middleware' => 'web'], function(){

    Route::get('/search', 'googleController@search');

    Route::get('/results', 'googleController@results');

    Route::get('/about', 'googleController@about');



});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/create/{place_id}', array(
        'uses' =>'databaseController@create'
    ));

    Route::post('/create', 'databaseController@store');


    Route::post('user/additional-fields',array(
        'uses' => 'UserController@postAdditionalFields',
        'as'   => 'user.postAdditionalFields'
    ));

    Route::get('view', 'databaseController@view');

    Route::post('delete', 'databaseController@delete');

});




Route::get('/googleplaces/{searchTerm}', function($searchTerm){
  $GoogleMaps = new GoogleMaps([

  ]);

  $results = $GoogleMaps->searchPlace($searchTerm);
  dd($results);
});



Route::controllers([
    'admin' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
