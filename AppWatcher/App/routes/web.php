<?php

Route::group(
    [
      'middleware' => ['web', 'auth', AppWatcher\Http\Middleware\AppChecker::class],
      'prefix' => 'apps', 'namespace' => 'AppWatcher\App\Http\Controllers'
    ],
    function () {
        Route::resource('/', 'AppController');
        Route::group(['prefix' => '{app_name}'], function(){
            Route::resource('dashboard', 'LogController');
        });
    }
);
