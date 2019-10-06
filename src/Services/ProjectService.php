<?php

/*
|--------------------------------------------------------------------------
| ProjectService
|--------------------------------------------------------------------------
|
| Service to handle all sorts of operations regarding the projects.
|
*/

namespace Tjventurini\VoyagerProjects\Services;

use Tjventurini\VoyagerProjects\Models\Project;

class ProjectService
{
    /**
     * Method to get the current project by header information.
     *
     * @return \Tjventurini\VoyagerProjects\Models\Project
     */
    public function getCurrentProject(): Project
    {
        $project_token = request()->headers->get('project_token', false);
        return Project::where('token', $project_token)->firstOrFail();
    }
}
