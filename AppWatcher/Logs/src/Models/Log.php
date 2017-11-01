<?php

namespace AppWatcher\Logs\Models;

use Illuminate\Database\Eloquent\Model;
use AppWatcher\Logs\Models\Scopes\AppLogs;

class Log extends Model
{
    protected $fillable = ['app_id', 'log', 'type'];


    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AppLogs());
    }

    /**
     * many to many relation with tags
     */
    public function tags(){
        return $this->belongsToMany(\AppWatcher\Logs\Models\Tag::class, 'log_tag');
    }
}
