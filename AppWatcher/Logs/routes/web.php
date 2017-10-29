<?php

Route::group(['middleware' => 'web', 'prefix' => 'logs', 'namespace' => 'AppWatcher\Logs\Http\Controllers'], function()
{
    Route::get('/', 'LogsController@index');
});
