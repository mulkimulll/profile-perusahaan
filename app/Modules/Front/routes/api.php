<?php

Route::group(['module' => 'Front', 'middleware' => ['api'], 'namespace' => 'App\Modules\Front\Controllers'], function() {

    Route::resource('Front', 'FrontController');

});
