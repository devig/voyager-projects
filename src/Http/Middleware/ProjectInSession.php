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

        // set project in session
        $request->session()->put('project', $project);
    }
}
