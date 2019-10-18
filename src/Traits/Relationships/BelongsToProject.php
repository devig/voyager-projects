<?php

/*
|--------------------------------------------------------------------------
| BelongsToProject Trait
|--------------------------------------------------------------------------
|
| Trait to add a belongs to relationship to models.
|
*/

namespace Tjventurini\VoyagerProjects\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToProject
{
    /**
     * Relationship with project model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projects(): BelongsTo
    {
        $model = config('voyager-projects.models.projects');
        $project_id = config('voyager-projects.foreign_keys.project');

        return $this->belongsToMany($model, $project_id);
    }
}
