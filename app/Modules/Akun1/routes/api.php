<?php

Route::group(['module' => 'Akun1', 'middleware' => ['api'], 'namespace' => 'App\Modules\Akun1\Controllers'], function() {

    Route::resource('Akun1', 'Akun1Controller');

});
