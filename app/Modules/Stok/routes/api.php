<?php

Route::group(['module' => 'Stok', 'middleware' => ['api'], 'namespace' => 'App\Modules\Stok\Controllers'], function() {

    Route::resource('Stok', 'StokController');

});
