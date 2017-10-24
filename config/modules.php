<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module Namespace
    |--------------------------------------------------------------------------
    |
    | Default module namespace.
    |
    */

    'namespace' => 'AppWatcher',

    /*
    |--------------------------------------------------------------------------
    | Module Stubs
    |--------------------------------------------------------------------------
    |
    | Default module stubs.
    |
    */

    'stubs' => [
        'enabled' => false,
        'path' => base_path() . '/vendor/nwidart/laravel-modules/src/Commands/stubs',
        'files' => [
            'routes' => 'routes/web.php',
            'views/index' => 'resources/views/index.blade.php',
            'views/master' => 'resources/views/layouts/master.blade.php',
            'scaffold/config' => 'config/config.php',
            'composer' => 'composer.json',
        ],
        'replacements' => [
            'routes' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'json' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'views/index' => ['LOWER_NAME'],
            'views/master' => ['STUDLY_NAME'],
            'scaffold/config' => ['STUDLY_NAME'],
            'composer' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'VENDOR',
                'AUTHOR_NAME',
                'AUTHOR_EMAIL',
                'MODULE_NAMESPACE',
            ],
        ],
    ],
    'paths' => [
        /*
        |--------------------------------------------------------------------------
        | Modules path
        |--------------------------------------------------------------------------
        |
        | This path used for save the generated module. This path also will be added
        | automatically to list of scanned folders.
        |
        */

        'modules' => base_path('AppWatcher'),
        /*
        |--------------------------------------------------------------------------
        | Modules assets path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules assets path.
        |
        */

        'assets' => resource_path('assets/app-watcher'),
        /*
        |--------------------------------------------------------------------------
        | The migrations path
        |--------------------------------------------------------------------------
        |
        | Where you run 'module:publish-migration' command, where do you publish the
        | the migration files?
        |
        */

        'migration' => base_path('database/migrations'),
        /*
        |--------------------------------------------------------------------------
        | Generator path
        |--------------------------------------------------------------------------
        | Customise the paths where the folders will be generated.
        | Se the generate key to false to not generate that folder
        */
        'generator' => [
            'config' => ['path' => 'config', 'generate' => true],
            'command' => ['path' => 'console', 'generate' => false],
            'migration' => ['path' => 'database/migrations', 'generate' => true],
            'seeder' => ['path' => 'database/seeders', 'generate' => false],
            'factory' => ['path' => 'database/factories', 'generate' => false],
            'routes' => ['path' => 'routes', 'generate' => true],
            'model' => ['path' => 'src/Models', 'generate' => true],
            'scope' => ['path' => 'src/Models/Scopes', 'generate' => true],
            'trait' => ['path' => 'src/Models/Traits', 'generate' => true],
            'presenter' => ['path' => 'src/Models/Presenters', 'generate' => true],
            'enum' => ['path' => 'src/Models/Enums', 'generate' => true],
            'resource' => ['path' => 'src/Models/Transformers', 'generate' => true],
            'controller' => ['path' => 'src/Http/Controllers', 'generate' => true],
            'facades' => ['path' => 'src/Http/Facades', 'generate' => true],
            'filter' => ['path' => 'src/Http/Middleware', 'generate' => true],
            'request' => ['path' => 'src/Http/Requests', 'generate' => true],
            'provider' => ['path' => 'src/Providers', 'generate' => false],
            'assets' => ['path' => 'resources/assets', 'generate' => true],
            'lang' => ['path' => 'resources/lang', 'generate' => true],
            'views' => ['path' => 'resources/views', 'generate' => true],
            'test' => ['path' => 'tests', 'generate' => false],
            'repository' => ['path' => 'src/Repositories', 'generate' => true],
            'event' => ['path' => 'src/Events', 'generate' => true],
            'listener' => ['path' => 'src/Listeners', 'generate' => true],
            'policies' => ['path' => 'src/Policies', 'generate' => false],
            'rules' => ['path' => 'src/Rules', 'generate' => false],
            'jobs' => ['path' => 'src/Jobs', 'generate' => false],
            'emails' => ['path' => 'src/Emails', 'generate' => false],
            'notifications' => ['path' => 'src/Notifications', 'generate' => true]
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Scan Path
    |--------------------------------------------------------------------------
    |
    | Here you define which folder will be scanned. By default will scan vendor
    | directory. This is useful if you host the package in packagist website.
    |
    */

    'scan' => [
        'enabled' => false,
        'paths' => [
            base_path('vendor/*/*'),
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Composer File Template
    |--------------------------------------------------------------------------
    |
    | Here is the config for composer.json file, generated by this package
    |
    */

    'composer' => [
        'vendor' => 'app-watcher',
        'author' => [
            'name' => 'App Watcher',
            'email' => 'mohamed.n.haleem@gmail.com',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | Here is the config for setting up caching feature.
    |
    */
    'cache' => [
        'enabled' => false,
        'key' => 'laravel-modules',
        'lifetime' => 60,
    ],
    /*
    |--------------------------------------------------------------------------
    | Choose what laravel-modules will register as custom namespaces.
    | Setting one to false will require you to register that part
    | in your own Service Provider class.
    |--------------------------------------------------------------------------
    */
    'register' => [
        'translations' => true,
    ],
];
