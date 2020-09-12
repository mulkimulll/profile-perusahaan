<?php

Route::group(['module' => 'Stok', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Stok\Controllers'], function() {

    // Route::resource('Stok', 'StokController');
    Route::get('/stok',						['uses' => 'StokController@index', 'as'=>'stok']);
	Route::get('/stok-load',				['uses' => 'StokController@load', 'as'=>'stok-load']);
	Route::post('/stok-data',				['uses' => 'StokController@data', 'as'=>'stok-data']);

});
