<?php

Route::group(
    [
        'middleware' => [AppWatcher\Core\Http\Middleware\ClientAuth::class],
        'prefix'     => 'api/{app_key}/logs',
        'namespace'  => 'AppWatcher\Logs\Http\Controllers',
    ],
    function () {
        Route::get('/', 'LogsController@index');
        Route::post('/', 'LogsController@store');
    }
);
