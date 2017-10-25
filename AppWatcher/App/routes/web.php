<?php

Route::group(
    [
      'middleware' => ['web', 'auth', AppWatcher\Http\Middleware\AppChecker::class],
      'prefix' => 'apps', 'namespace' => 'AppWatcher\App\Http\Controllers'
    ],
    function () {
        Route::get('/', 'AppController@index');
    }
);
