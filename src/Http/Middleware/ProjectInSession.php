<?php

namespace Tjventurini\VoyagerProjects\Http\Middleware;

use Closure;

class ProjectInSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->setProjectInSession($request);
        return $next($request);
    }

    /**
     * Set the project if there is one in GET
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return void
     */
    private function setProjectInSession($request): void
    {
        // get project from request
        $project = $request->input('project', false);

        // check if there is a project
        if (!$project) {
            return;
        }

        // check if value is set to all
        if ($project == 'all') {
            return;
        }

        // find project in database
        $Project = app(config('voyager-projects.models.project'))
                    ->where('slug', $project)
                    ->firstOrFail();

        // set project in session
        $request->session()->put('project', [
            'id' => $Project->id,
            'slug' => $Project->slug,
        ]);
    }
}
