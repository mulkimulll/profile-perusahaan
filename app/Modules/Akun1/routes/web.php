<?php

Route::group(['module' => 'Akun1', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Akun1\Controllers'], function() {

    // Route::resource('Akun1', 'Akun1Controller');
    Route::get('/akundist',                         ['uses' => 'Akun1Controller@index', 'as'=>'akundist']);
    Route::get('/akundist-load',                    ['uses' => 'Akun1Controller@load', 'as'=>'akundist-load']);
    Route::post('/akundist-data',					['uses' => 'Akun1Controller@data', 'as'=>'akundist-data']);
	// Route::get('/akundist-pass',                    ['uses' => 'Akun1Controller@pass', 'as'=>'akundist-pass']);

});
