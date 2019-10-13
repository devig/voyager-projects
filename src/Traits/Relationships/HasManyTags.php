<?php

/*
|--------------------------------------------------------------------------
| HasManyTags Trait
|--------------------------------------------------------------------------
|
| Trait to add many to many relationship to models.
|
*/

namespace Tjventurini\VoyagerProjects\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyTags
{
    /**
     * Relationship with project model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags(): HasMany
    {
        $model = config('voyager-tags.models.tag');
        $tags_id = config('voyager-tags.foreign_keys.tag');

        return $this->hasMany($model, $tags_id);
    }
}
