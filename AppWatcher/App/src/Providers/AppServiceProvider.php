<?php

namespace AppWatcher\App\Providers;

use Illuminate\Http\Request;
use AppWatcher\App\Models\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Contracts\Events\Dispatcher;
use AppWatcher\App\Repositories\AppRepository;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use AppWatcher\App\Repositories\Eloquent\EloquentAppRepository;


class AppServiceProvider extends ServiceProvider
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
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $request = resolve(Request::class);
            if ($request->route('app_name')) {
                $event->menu->add('LOGS');
                $event->menu->add([
                    'text' => 'Errors',
                    'url' => $request->route('app_name').'/logs?type=errors',
                    'icon' => 'info',
                    'icon_color' => 'danger',
                ],
                [
                    'text' => 'Warnings',
                    'url' => $request->route('app_name').'/logs?type=warnings',
                    'icon' => 'warning',
                    'icon_color' => 'warning',
                ],
                [
                    'text' => 'Info',
                    'url' => $request->route('app_name').'/logs?type=info',
                    'icon' => 'exclamation-circle',
                    'icon_color' => 'info',
                ]
                );
            }
         });
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
        $this->app->bind(AppRepository::class, function () {
            $repository = new EloquentAppRepository(new App());
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
