<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'users', 'namespace' => 'AppWatcher\User\Http\Controllers'], function () {
    Route::get('/', 'UserController@index');
});
