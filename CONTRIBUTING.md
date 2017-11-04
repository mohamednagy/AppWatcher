# Basic Usage

- [Configuration](#configuration)
    * [Default namespace](#default-namespace)
    * [Overwrite the generated files](#overwrite-the-generated-files)
    * [Scan additional folders for modules](#scan-additional-folders-for-modules)
    * [Composer file template](#composer-file-template)
    * [Caching](#caching)
    * [Registering custom namespace](#registering-custom-namespace)
    * [Our configuration template](#our-configuration-template)
- [Creating Module](#creating-module)
    * [Steps to follow after creating new module](#steps-to-follow-after-creating-new-module)
    * [Folder Structure](#folder-structure)
    * [Custom namespaces](#custom-namespaces)
- [Manifest File](#manifest-file)
- [Composer File](#composer-file)

## Configuration

You can publish the package configuration using the following command:

``` bash
php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"
```

In the published configuration file you can configure the following things:

### Default namespace

What the default namespace will be when generating modules.

Key: `namespace`

Default: `Modules`

### Overwrite the generated files

Overwrite the default generated stubs to be used when generating modules. This can be useful to customise the output of different files.

Key: `stubs`

### Overwrite the paths

Overwrite the default paths used throughout the package.

Key: `paths`

### Scan additional folders for modules

This is disabled by default. Once enabled, the package will look for modules in the specified array of paths.

Key: `scan`

### Composer file template

Customise the generated `composer.json` file.

Key: `composer`

### Caching

If you have many modules it's a good idea to cache this information (like the multiple `module.json` files for example).

Key: `cache`

### Registering custom namespace

Decide which custom namespaces need to be registered by the package. If one is set to false, the package won't handle its registration.

Key: `register`

### Our configuration template

``` php
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
            'presenter' => ['path' => 'src/Models/Presenters', 'generate' => false],
            'enum' => ['path' => 'src/Models/Enums', 'generate' => true],
            'resource' => ['path' => 'src/Models/Transformers', 'generate' => false],
            'controller' => ['path' => 'src/Http/Controllers', 'generate' => true],
            'facades' => ['path' => 'src/Http/Facades', 'generate' => true],
            'filter' => ['path' => 'src/Http/Middleware', 'generate' => false],
            'request' => ['path' => 'src/Http/Requests', 'generate' => true],
            'provider' => ['path' => 'src/Providers', 'generate' => false],
            'assets' => ['path' => 'resources/assets', 'generate' => true],
            'lang' => ['path' => 'resources/lang', 'generate' => true],
            'views' => ['path' => 'resources/views', 'generate' => true],
            'test' => ['path' => 'tests', 'generate' => false],
            'repository' => ['path' => 'src/Repositories', 'generate' => true],
            'event' => ['path' => 'src/Events', 'generate' => false],
            'listener' => ['path' => 'src/Listeners', 'generate' => false],
            'policies' => ['path' => 'src/Policies', 'generate' => false],
            'rules' => ['path' => 'src/Rules', 'generate' => false],
            'jobs' => ['path' => 'src/Jobs', 'generate' => false],
            'emails' => ['path' => 'src/Emails', 'generate' => false],
            'notifications' => ['path' => 'src/Notifications', 'generate' => false]
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
            'email' => 'info@app-watcher.com',
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
```

**Tip: keep this documentation updated with any changes to config file**

## Creating Module

Creating a module is simple and straightforward. Run the following command to create a module.

``` bash
php artisan module:make <module-name>
```

Replace `<module-name>` by your desired name.

It is also possible to create multiple modules in one command.

``` bash
php artisan module:make Blog User Auth
```

By default when you create a new module, the command will add some resources like a controller, seed class, service provider, etc. automatically. If you don't want these, you can add `--plain` flag, to generate a plain module.

``` bash
php artisan module:make Blog --plain
# or
php artisan module:make Blog -p
```

## Steps to follow after creating new module:

### 1. Edit `composer.json` file
Update `psr-4` section to:
```json
"psr-4": {
    "NameSpace\\ModuleStudlyName\\": "src/"
}
```
### 2. Edit `$ModuleNameServiceProvider`
Remove all resources register functions and empty `boot` function body. 
### 3. Edit `module.json` file
Clear `files` section from any files.
### 4. Run `composer dumpautoload`.

### Folder structure

``` markdown
app/
bootstrap/
.
.
AppWAtcher
└── App
    ├── config
    │   └── config.php
    ├── database
    │   ├── migrations
    │   └── seeders
    │       └── AppDatabaseSeeder.php
    ├── resources
    │   ├── assets
    │   ├── lang
    │   └── views
    │       ├── layouts
    │       │   └── master.blade.php
    │       └── index.blade.php
    ├── routes
    │   ├── api.php
    │   ├── console.php
    │   └── web.php
    ├── src
    │   ├── Http
    │   │   ├── Controllers
    │   │   │   └── AppController.php
    │   │   └── Requests
    │   ├── Models
    │   │   ├── Enums
    │   │   ├── Scopes
    │   │   └── Traits
    │   ├── Providers
    │   │   └── AppServiceProvider.php
    │   ├── Repositories
    │   └── helpers.php
    ├── composer.json
    └── module.json
```

### Custom namespaces

When you create a new module it also registers new custom namespace for `Lang`, `View` and `Config`. For example, if you create a new module named app, it will also register new namespace/hint app for that module. Then, you can use that namespace for calling `Lang`, `View` or `Config`. Following are some examples of its usage:

Calling Lang:

```php
trans('app::group.name');

@trans('app::group.name');
```

Calling View:

```php
view('app::index')

view('app::partials.sidebar')
```

Calling Config:

```php
Config::get('app.name')
```

You can get the path to the given module.

```php
$path = module_path('App');
```

### Manifest File

Along with the structure, every module has a `module.json` manifest file. This manifest file is used to outline information such as the description, version, author(s), and anything else you'd like to store pertaining to the module at hand.

``` json
{
    "name": "App",
    "alias": "app",
    "description": "app module",
    "keywords": [],
    "active": 1,
    "order": 1,
    "providers": [],
    "aliases": {},
    "files": [
        "src/helpers.php"
    ],
    "requires": []
}
```
- `name` - A human-friendly name of the module. `Not required`.
- `alias` - The slug of the module. This is used for identification purposes.
- `description` - A description of the module. `Not required`.
- `active` - define module status `enabled/disabled`.
- `order` - The order of which modules are loaded. `optional`, but if you have a requirement to load a module later this is the option you are looking for.
- `providers` - register module providers, but if package support `laravel autodiscovery` you don't need to register the service provider.
- `aliases` - register packages aliases.
- `files` - require module helper files.

### Composer file

``` json
{
"name": "app-watcher/app",
    "description": "",
    "authors": [
        {
            "name": "App Watcher",
            "email": "info@app-watcher.com"
        }
    ]
    "autoload": {
        "psr-4": {
            "NamespaceName\\SubNamespaceNames\\": "path"
        }
    },
    "require": {}
}
```

- `autoload` - register module's `autoloaders`.
- `require` - you can require your dependencies and need to run: 
```` bash
php artisan module:udpdate <module-name>
```` 
