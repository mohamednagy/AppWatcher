<?php


namespace AppWatcher\Logs\Repositories\Eloquent;

use AppWatcher\Logs\Repositories\LogRepository;
use AppWatcher\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentLogRepository extends EloquentBaseRepository implements LogRepository
{
    public function createLog($data, $tags, $app){
        unset($data['tags']);
        $log = $app->logs()->create($data);
        if($tags){
            $tagIds = [];
            foreach ($tags as $tag) {
                $tagIds[] = $tag->id;
            }
            $log->tags()->attach($tagIds);
        }
        return $log;
    }
}
