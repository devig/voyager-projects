<?php

/*
|--------------------------------------------------------------------------
| BelongsToManyProjects Trait
|--------------------------------------------------------------------------
|
| Trait to add many to many relationship to models.
|
*/

namespace Tjventurini\VoyagerProjects\Models\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToManyProjects
{
    /**
     * Relationship with project model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        $key = $this->getRelationshipKey();
        $model = config('voyager-projects.models.projects');
        $table = config('voyager-projects.tables.' . $key);
        $project_id = config('voyager-projects.foreign_keys.project');
        $foreign_key = config('voyager-projects.foreign_keys.' . $key);

        return $this->belongsToMany($model, $table, $foreign_key, $project_id);
    }
}
