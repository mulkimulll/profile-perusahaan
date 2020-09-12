<?php

Route::group(['module' => 'Akun', 'middleware' => ['web','auth','role:super|own|dist'], 'namespace' => 'App\Modules\Akun\Controllers'], function() {
        Route::get('/akun',                         ['uses' => 'AkunController@index', 'as'=>'akun']);
        Route::get('/akun-load',                    ['uses' => 'AkunController@load', 'as'=>'akun-load']);
        Route::post('/akun-data',					['uses' => 'AkunController@data', 'as'=>'akun-data']);
		Route::get('/akun-pass',               ['uses' => 'AkunController@pass', 'as'=>'akun-pass']);
});
