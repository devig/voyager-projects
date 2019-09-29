<?php

/*
|--------------------------------------------------------------------------
| HasProjects Trait
|--------------------------------------------------------------------------
|
| Trait to add many to many relationship to models.
|
*/

namespace Tjventurini\VoyagerProjects\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasProjects
{
    /**
     * Relationship with project model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        $model = config('voyager-projects.models.projects');
        $table = config('voyager-projects.tables.users');
        $project_id = config('voyager-projects.foreign_keys.project');
        $user_id = config('voyager-projects.foreign_keys.users');

        return $this->belongsToMany($model, $table, $user_id, $project_id);
    }
}
