<?php

Route::group(['module' => 'Front', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Front\Controllers'], function() {

    Route::get('/front',					['uses' => 'FrontController@index', 'as'=>'front']);
	Route::get('/front-load',				['uses' => 'FrontController@load', 'as'=>'front-load']);
	Route::post('/front-data',				['uses' => 'FrontController@data', 'as'=>'front-data']);

});
