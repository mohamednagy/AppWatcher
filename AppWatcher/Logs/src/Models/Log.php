<?php

namespace AppWatcher\Logs\Models;

use AppWatcher\Logs\Models\Scopes\AppScope;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['app_id', 'log', 'type'];

    private $logTypes = [0 => 'error', 1 => 'warning', '2' => 'info'];

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

    /**
     * many to many relation with tags.
     */
    public function tags()
    {
        return $this->belongsToMany(\AppWatcher\Logs\Models\Tag::class, 'log_tag');
    }

    public function getTypeAttribute($value)
    {
        return $this->logTypes[$value];
    }
}
