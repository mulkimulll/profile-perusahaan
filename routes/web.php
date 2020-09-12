<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', 'DepanController@index');
Auth::routes();

/*
Route::group(['middleware' => ['web'], 'namespace' => 'Auth'], function() {
    Route::get('/login',								['uses' => 'LoginController@showLoginForm', 'as'=>'login']);
    Route::post('/login',								['uses' => 'LoginController@login', 'as'=>'']);
    Route::get('/logout',								['uses' => 'LoginController@logout', 'as'=>'logout', 'middleware' => ['auth'] ]);
    Route::post('/password/email',						['uses' => 'ForgotPasswordController@sendResetLinkEmail', 'as'=>'password.email']);
    Route::get('/password/reset',						['uses' => 'ForgotPasswordController@showLinkRequestForm', 'as'=>'password.request']);
    Route::post('/password/reset',						['uses' => 'ResetPasswordController@reset', 'as'=>'password.update']);
    Route::get('/password/reset/{token}',				['uses' => 'ResetPasswordController@showResetForm', 'as'=>'password.reset']);
    Route::get('/register',								['uses' => 'RegisterController@showRegistrationForm', 'as'=>'register']);
    Route::post('/register',							['uses' => 'RegisterController@register', 'as'=>'']);
});
*/

/*
Route::get('/login',								['uses' => 'LoginController@showLoginForm', 'as'=>'login']);
Route::get('/login',								['uses' => 'LoginController@login', 'as'=>'']);
Route::get('/logout',								['uses' => 'LoginController@logout', 'as'=>'logout']);
Route::get('/password/email',								['uses' => 'ForgotPasswordController@sendResetLinkEmail', 'as'=>'password.email']);
Route::get('/password/reset',								['uses' => 'ForgotPasswordController@showLinkRequestForm', 'as'=>'password.request']);
Route::get('/password/reset',								['uses' => 'ResetPasswordController@reset', 'as'=>'password.update']);
Route::get('/password/reset/{token}',								['uses' => 'ResetPasswordController@showResetForm', 'as'=>'password.reset']);
Route::get('/register',								['uses' => 'RegisterController@showRegistrationForm', 'as'=>'register']);
Route::get('/register',								['uses' => 'RegisterController@register', 'as'=>'']);

|        | GET|HEAD | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
|        | POST     | login                  |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
|        | POST     | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web          |
|        | POST     | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
|        | GET|HEAD | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
|        | POST     | password/reset         | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
|        | GET|HEAD | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
|        | GET|HEAD | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
|        | POST     | register               |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
*/
