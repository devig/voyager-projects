<?php

namespace Tjventurini\VoyagerProjects\Observers;

use Tjventurini\VoyagerProjects\Models\Project;
use Illuminate\Support\Str;

class ProjectObserver
{
    /**
     * Handle saving event of project model.
     * @param  \Tjventurini\VoyagerProjects\Project $project The project model.
     * @return void
     */
    public function saving(Project $project): void
    {
        // check that url has http or https protocol
        if (!preg_match("/^(http|https):\\/\\//", $project->url)) {
            $project->url = "https://" . $project->url;
        }
    }

    /**
     * Handle creating event of project model.
     * @param  Project $project The project model.
     * @return void
     */
    public function creating(Project $project): void
    {
        // create token
        $project->token = Str::random(60);
    }
}
