<?php

Route::group(['module' => 'Report', 'middleware' => ['web'], 'namespace' => 'App\Modules\Report\Controllers'], function() {

    Route::get('/report',						['uses' => 'ReportController@index', 'as'=>'report']);
	Route::get('/report-load',				['uses' => 'ReportController@load', 'as'=>'report-load']);
	Route::post('/report-data',				['uses' => 'ReportController@data', 'as'=>'report-data']);

});
