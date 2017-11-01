<?php

namespace AppWatcher\Logs\Models\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use AppWatcher\App\Repositories\AppRepository;

class AppLogs implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $request = app('Illuminate\Http\Request');
        $app = AppRepository::whereAppKey($request->route('app_key'))->first();
        $builder->where('app_id', $app->id);
    }
}

 ?>
