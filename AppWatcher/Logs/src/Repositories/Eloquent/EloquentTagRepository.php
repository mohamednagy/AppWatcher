<?php

namespace AppWatcher\Logs\Repositories\Eloquent;

use AppWatcher\Core\Repositories\Eloquent\EloquentBaseRepository;
use AppWatcher\Logs\Repositories\TagRepository;

class EloquentTagRepository extends EloquentBaseRepository implements TagRepository
{
    public function getTagsRelatedtoApp($tags, $app)
    {
        $allTags = [];
        if (is_array($tags)) {
            foreach ($tags as $tag) {
                $allTags[] = $this->model->firstOrCreate(['name' => $tag, 'app_id' => $app->id]);
            }
        } else {
            $allTags[] = $this->model->firstOrCreate(['name' => $tags, 'app_id' => $app->id]);
        }

        return $allTags;
    }
}
