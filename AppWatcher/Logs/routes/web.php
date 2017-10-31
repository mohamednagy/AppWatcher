<?php

Route::group(['middleware' => 'web', 'prefix' => '{app_name}/logs', 'namespace' => 'AppWatcher\Logs\Http\Controllers'], function()
{
    Route::get('/', 'LogsController@index');
});
