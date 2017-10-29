<?php


namespace AppWatcher\App\Repositories\Eloquent;

use AppWatcher\App\Repositories\AppRepository;
use AppWatcher\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentAppRepository extends EloquentBaseRepository implements AppRepository
{

    public function  create($data){
        $data['app_key'] = uniqueString();
        $data['app_secret'] = uniqueString();
        return parent::create($data);
    }
}
