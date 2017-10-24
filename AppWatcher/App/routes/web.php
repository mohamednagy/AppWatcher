<?php

Route::group(['middleware' => 'web', 'prefix' => 'app', 'namespace' => 'AppWatcher\App\Http\Controllers'], function()
{
    Route::get('/', 'AppController@index');
});
