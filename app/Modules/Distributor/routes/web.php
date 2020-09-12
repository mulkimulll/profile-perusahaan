<?php

Route::group(['module' => 'Distributor', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Distributor\Controllers'], function() {

    Route::get('/dist',						['uses' => 'DistributorController@index', 'as'=>'dist']);
	Route::get('/dist-load',				['uses' => 'DistributorController@load', 'as'=>'dist-load']);
	Route::post('/dist-data',				['uses' => 'DistributorController@data', 'as'=>'dist-data']);

});
