<?php

namespace App\Providers;

use Composer\Autoload\ClassLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Nwidart\Modules\Module;
use Illuminate\Support\Str;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $modules = $this->app['modules']->enabled();

        foreach ($modules as $module)
        {
            //$this->registerAutoload($module);
            $this->registerRoutes($module);
            $this->registerConfig($module);
            $this->registerMigrations($module);
            $this->registerViews($module);
            $this->registerTranslations($module);
            $this->registerFactories($module);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Register module' routes
     *
     * @param Module $module
     * @return void
     */
    protected function registerRoutes(Module $module)
    {
         foreach(glob($module->getExtraPath('routes').'/*.php') as $routeFile) {
             if (file_exists($routeFile)) {
                 $this->loadRoutesFrom($routeFile);
             }
         }
    }

    /**
     * Register module' config.
     *
     * @param Module $module
     * @return void
     */
    protected function registerConfig(Module $module)
    {
        $configFile = $module->getExtraPath('config/config.php');

        if (file_exists($configFile)) {
            $this->mergeConfigFrom($configFile, $module->getLowerName());
            $this->publishes([
                $configFile => config_path($module->getLowerName().'.php'),
            ], 'config');
        }
    }

    /**
     * Register module' migrations.
     *
     * @param Module $module
     * @return void
     */
    protected function registerMigrations(Module $module)
    {
        $migrationsDir = $module->getExtraPath('database/migrations');

        if (file_exists($migrationsDir)) {
            $this->loadMigrationsFrom($migrationsDir);
            $this->publishes([
                $migrationsDir => database_path('migrations'),
            ], 'migrations');
        }
    }

    /**
     * Register module' views.
     *
     * @param Module $module
     * @return void
     */
    public function registerViews(Module $module)
    {
        $sourcePath = $module->getExtraPath('resources/views');

        $viewPath = resource_path('views/modules/'.$module->getLowerName());

        $this->loadViewsFrom(array_merge(array_map(function ($path) use($module){
            return $path . '/modules/'. $module->getLowerName();
        }, config('view.paths')), [$sourcePath]), $module->getLowerName());

        $this->publishes([
            $sourcePath => $viewPath,
        ]);
    }

    /**
     * Register module' translations.
     *
     * @param Module $module
     * @return void
     */
    public function registerTranslations(Module $module)
    {
        $langPath = resource_path('lang/modules/'. $module->getLowerName());

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $module->getLowerName());
        } else {
            $this->loadTranslationsFrom($module->getExtraPath('resources/lang'), $module->getLowerName());
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @param Module $module
     * @return void
     * @source https://github.com/sebastiaanluca/laravel-resource-flow/blob/develop/src/Modules/ModuleServiceProvider.php#L66
     */
    public function registerFactories(Module $module)
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load($module->getExtraPath('database/factories'));
        }
    }


    /**
     * Registers autoloading for the Module.
     *
     * @param Module $module
     */
    protected function registerAutoload(Module $module)
    {
        $loader = new ClassLoader();

        $loader->addPsr4($this->getNameSpace($module->getComposerAttr('name')), $module->getPath().'/src');

        $loader->register();

        $loader->setUseIncludePath(true);
    }

    /**
     * Get name space from slug
     *
     * @param $name
     * @return string
     */
    protected function getNameSpace($name)
    {
        list($vendor , $name) = explode('/', $name);

        return Str::studly($vendor) .'\\'.Str::studly($name).'\\';
    }
}
