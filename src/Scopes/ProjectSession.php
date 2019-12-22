<?php

namespace Tjventurini\VoyagerProjects\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProjectSession implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // get project from session
        $project = session('project', null);

        // check if there is a project set
        if (!$project) {
            return;
        }

        // check if project is set to 'all'
        if ($project == 'all') {
            return;
        }

        // set project scope
        $builder->where('slug', $project);
    }
}
