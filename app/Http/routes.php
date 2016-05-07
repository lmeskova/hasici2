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
/*
Route::get('/   ','MainMenuController@index');

Route::get('newIncident','IncidentController@createNew');

Route::get('details','IncidentDetailController@details');

Route::get('objects','DamagedObjectController@objects');
*/


Route::group([], function(){
    Route::get('/', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index'
    ]);

    Route::group([
        'as' => 'incident.',
        'prefix' => 'incident'
    ], function(){

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'IncidentController@create'
        ]);
        Route::post('/create', 'IncidentController@store');



        Route::get('/{incidentId}', 'IncidentController@show');

        Route::get('/{incidentId}/edit', 'IncidentController@edit');
        Route::post('/{incidentId}/edit', 'IncidentController@update');

    });

    Route::group([
        'as' => 'incident-detail.',
        'prefix' => 'incident-detail'
    ], function(){

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'IncidentDetailController@create'
        ]);
        Route::post('/create', 'IncidentDetailController@store');



        Route::get('/{incidentId}', 'IncidentDetailController@show');

        Route::get('/{incidentId}/edit', 'IncidentDetailController@edit');
        Route::post('/{incidentId}/edit', 'IncidentDetailController@update');

    });
});



Route::get('/dummy', function () {

    $t = new InsuranceCompaniesSeeder();
    return $t->run();


});