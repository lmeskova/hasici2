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
/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/   ','MainMenuController@index');

Route::get('newIncident','IncidentController@createNew');

Route::get('details','IncidentDetailController@details');

Route::get('objects','DamagedObjectController@objects');




Route::get('/dummy', function () {

    $t = new InsuranceCompaniesSeeder();
    return $t->run();


});