<?php

Route::group(['module' => 'Distributor', 'middleware' => ['api'], 'namespace' => 'App\Modules\Distributor\Controllers'], function() {

    Route::resource('Distributor', 'DistributorController');

});
