<?php

namespace AppWatcher\Logs\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use AppWatcher\Logs\Models\Log;
use AppWatcher\Logs\Models\Tag;
use AppWatcher\Logs\Repositories\LogRepository;
use AppWatcher\Logs\Repositories\TagRepository;
use AppWatcher\Logs\Repositories\Eloquent\EloquentTagRepository;
use AppWatcher\Logs\Repositories\Eloquent\EloquentLogRepository;

class LogsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
     public function register()
     {
         $this->registerBindings();
     }


     public function registerBindings(){
         $this->app->bind(LogRepository::class, function () {
             $repository = new EloquentLogRepository(new Log());
             return $repository;
         });

         $this->app->bind(TagRepository::class, function () {
             $repository = new EloquentTagRepository(new Tag());
             return $repository;
         });
     }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
