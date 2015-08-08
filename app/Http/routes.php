<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('pcounter', 'RetailOne\Http\Controllers\Api\VisitorController@record');
});

Route::get('', function () {
    return redirect()->route('AuthLogin');
});

// Authentication routes...
Route::get('auth/login', [
    'as'         => 'AuthLogin',
    'uses'       => 'Auth\AuthController@getLogin',
    'middleware' => 'guest'
]);

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin::', 'middleware' => 'role.admin'], function () {
        Route::get('', [
            'as'   => 'dashboard',
            'uses' => 'Backend\AdminController@index'
        ]);

        Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
            Route::get('', [
                'as'   => 'list',
                'uses' => 'Backend\ClientController@index'
            ]);
        });

        Route::group(['prefix' => 'stores', 'as' => 'stores.'], function () {
            Route::get('', [
                'as'   => 'list',
                'uses' => 'Backend\StoreController@index'
            ]);
        });
    });
});

