<?php

Route::group(['module' => 'Order', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Order\Controllers'], function() {

    // Route::resource('Order', 'OrderController');
    Route::get('/order',					['uses' => 'OrderController@index', 'as'=>'order']);
	Route::get('/order-load',				['uses' => 'OrderController@load', 'as'=>'order-load']);
	Route::post('/order-data',				['uses' => 'OrderController@data', 'as'=>'order-data']);

});
