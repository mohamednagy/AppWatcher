<?php

Route::group(['middleware' => 'web', 'prefix' => 'core', 'namespace' => 'AppWatcher\Core\Http\Controllers'], function()
{
    Route::get('/', 'CoreController@index');
});
