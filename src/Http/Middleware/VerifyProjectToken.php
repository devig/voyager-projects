<?php

namespace Tjventurini\VoyagerProjects\Http\Middleware;

use Closure;
use Tjventurini\VoyagerProjects\Models\Project;

class VerifyProjectToken
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
        $token = $request->header('project-token', false);

        if (!$token) {
            abort('401', 'You need to send a project token.');
        }

        $project = Project::where('token', $token)->first();

        if (!$project) {
            abort('401', 'Invalid project token.');
        }

        return $next($request);
    }
}
