<?php

Route::group(['middleware' => 'web', 'prefix' => '{app_key}/logs', 'namespace' => 'AppWatcher\Logs\Http\Controllers'], function()
{
    Route::get('/', 'LogsController@index');
});
