<?php
namespace AppWatcher\App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = ['name', 'description', 'app_key', 'app_secret'];
    protected $table = 'apps';

    /**
     * users belongs to app
     */
    public function users(){
        return $this->belongsToMany(\AppWatcher\User\Models\User::class);
    }

    /**
     * app has many logs
     */
    public function logs(){
        return $this->hasMany(\AppWatcher\Logs\Models\Log::class);
    }

}
