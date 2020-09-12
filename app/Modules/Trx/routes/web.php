<?php

Route::group(['module' => 'Trx', 'middleware' => ['web'], 'namespace' => 'App\Modules\Trx\Controllers'], function() {

    Route::resource('trx', 'TrxController');
    Route::get('/transaksi',						['uses' => 'TrxController@index', 'as'=>'transaksi']);
	Route::get('/transaksi-load',				['uses' => 'TrxController@load', 'as'=>'transaksi-load']);
	Route::post('/transaksi-data',				['uses' => 'TrxController@data', 'as'=>'transaksi-data']);

});
