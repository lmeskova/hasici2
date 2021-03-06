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
        'middleware' => 'auth',
        'uses' => 'DashboardController@index'
    ]);

    Route::group([
        'as' => 'incident.',
        'middleware' => 'auth',
        'prefix' => 'incident',

    ], function(){

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'IncidentController@create'
        ]);
        Route::post('/create', 'IncidentController@store');



        Route::group([
            'prefix' => '/{incidentId}'
        ], function(){

            Route::get('/', [
                'as' => 'show',
                'uses' => 'IncidentController@show'
            ]);

            Route::group([
                'as' => 'incidentDetail.',
                'prefix' => 'incident-detail'
            ], function(){

                Route::get('/create', [
                    'as' => 'create',
                    'uses' => 'IncidentDetailController@create'
                ]);
                Route::post('/create', 'IncidentDetailController@store');



                Route::get('/{incidentDetailId}', 'IncidentDetailController@show');

                Route::get('/{incidentDetailId}/edit', [
                    'as' => 'edit',
                    'uses' => 'IncidentDetailController@edit'
                ]);
                Route::post('/{incidentDetailId}/edit', 'IncidentDetailController@update');

            });


            Route::group([
                'as' => 'incidentDamagedObject.',
                'prefix' => 'incident-damaged-object'
            ], function(){

                Route::get('/create', [
                    'as' => 'create',
                    'uses' => 'IncidentDamagedObjectController@create'
                ]);
                Route::post('/create', 'IncidentDamagedObjectController@store');

                Route::get('/{incidentDamagedObjectId}', 'IncidentDamagedObjectController@show');

                Route::get('/{incidentDamagedObjectId}/edit', [
                    'as' => 'edit',
                    'uses' => 'IncidentDamagedObjectController@edit'
                ]); 
                Route::post('/{incidentDamagedObjectId}/edit', 'IncidentDamagedObjectController@update');

            });

            Route::group([
                'as' => 'injury.',
                'prefix' => 'injury'
            ], function(){

                Route::get('/create', [
                    'as' => 'create',
                    'uses' => 'InjuryController@create'
                ]);
                Route::post('/create', 'InjuryController@store');

                Route::get('/{injuryId}', 'InjuryController@show');

                Route::get('/{injuryId}/edit', [
                    'as' => 'edit',
                    'uses' => 'InjuryController@edit'
                ]);
                Route::post('/{injuryId}/edit', 'InjuryController@update');

            });
        });



        Route::get('/{incidentId}/edit', [
            'as' => 'edit',
            'uses' => 'IncidentController@edit'
        ]);
        Route::post('/{incidentId}/edit', 'IncidentController@update');

    });


});



Route::get('/dummy', function () {

    $t = new InsuranceCompaniesSeeder();
    return $t->run();


});
Route::auth();
