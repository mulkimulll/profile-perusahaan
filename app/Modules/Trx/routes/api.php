<?php

Route::group(['module' => 'Trx', 'middleware' => ['api'], 'namespace' => 'App\Modules\Trx\Controllers'], function() {

    Route::resource('trx', 'TrxController');

});
