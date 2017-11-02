<?php

namespace AppWatcher\Logs\Models\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AppScope implements Scope
{


    protected $appRepo;


    public function __construct(){
        $this->appRepo = app('AppWatcher\App\Repositories\AppRepository');
    }
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
        $app = $this->appRepo->findByAttributes(['app_key' => $request->route('app_key')]);
        $builder->where('app_id', $app->id);
    }
}

 ?>
