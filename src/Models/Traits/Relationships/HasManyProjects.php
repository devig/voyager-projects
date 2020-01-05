<?php
/*
|--------------------------------------------------------------------------
| HasManyProjects Trait
|--------------------------------------------------------------------------
|
| Trait to add HasMany Relationship with Project to a given model.
|
*/

namespace Tjventurini\VoyagerProjects\Models\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyProjects
{
    /**
     * HasMany relationship with Project model.
     *
     * @return HasMany
     */
    public function projects(): HasMany
    {
        $model = config('voyager-projects.models.project');
        $project_id = config('voyager-projects.foreign_keys.project');

        return $this->hasMany($model, $project_id);
    }
}
