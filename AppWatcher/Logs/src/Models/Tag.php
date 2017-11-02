<?php

namespace AppWatcher\Logs\Models;

use AppWatcher\Logs\Models\Scopes\AppScope;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'app_id'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AppScope());
    }
}
