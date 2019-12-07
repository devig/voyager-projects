<?php

namespace Tjventurini\VoyagerProjects\Seeds;

use App\User;
use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tjventurini\VoyagerProjects\Models\Project;

class VoyagerProjectsDemoContentSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        // create user
        User::firstOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);
        
        // create project
        $HelloWorldProject = Project::updateOrCreate([
            'slug' => 'hello-world'
        ], [
            'name' => 'Hello World',
            'description' => 'Hello World Project',
            'url' => 'http://hello-world.com',
            'token' => 'LYbggOGeifHHoKj38qjbYBajW91Q176mXWKD4xM2TjzhcwSlTn9hUEhTJw41'
        ]);

        // connect projects with user
        $User = User::findOrFail(1)
            ->projects()
            ->sync([
                $HelloWorldProject->id
            ]);
    }
}
