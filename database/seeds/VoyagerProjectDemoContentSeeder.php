<?php

namespace Tjventurini\VoyagerProjects\Seeds;

use App\User;
use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Support\Facades\DB;
use Tjventurini\VoyagerProjects\Models\Project;

class VoyagerProjectDemoContentSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        // create project
        $HelloWorldProject = Project::updateOrCreate([
            'slug' => 'hello-world'
        ], [
            'name' => 'Hello World',
            'description' => 'Hello World Project',
            'url' => 'http://hello-world.com'
        ]);

        // connect projects with user
        $User = User::findOrFail(1)
            ->projects()
            ->sync([
                $HelloWorldProject->id
            ]);
    }
}
