<?php

namespace AppWatcher\Logs\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'app_id'];
}
