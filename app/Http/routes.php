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

Route::get('/googlemaps/{searchTerm}', function($searchTerm){
    $GoogleMaps = new GoogleMaps([

    ]);

    $results = $GoogleMaps->search($searchTerm);
    dd($results);



});

Route::get('/', function () {
    return view('welcome');
});
