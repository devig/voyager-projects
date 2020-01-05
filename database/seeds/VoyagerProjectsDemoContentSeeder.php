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
        $User = $this->user();
        $this->projects($User);
    }

    /**
     * @return mixed
     */
    private function user(): User
    {
        // create user
        $User = User::firstOrCreate(['email' => 'admin@admin.com'], [
            'name'     => 'Admin',
            'password' => Hash::make('password'),
            'role_id'  => 1,
        ]);
        return $User;
    }

    /**
     * @param $User
     */
    private function projects($User): void
    {
        // create project
        $HelloWorldProject_1 = Project::updateOrCreate(['slug' => 'hello-world-1'], [
            'name'        => 'Hello World 1',
            'description' => 'Hello World Project',
            'url'         => 'http://hello-world.com',
            'token'       => 'LYbggOGeifHHoKj38qjbYBajW91Q176mXWKD4xM2TjzhcwSlTn9hUEhTJw41',
        ]);

        // create second project
        $HelloWorldProject_2 = Project::updateOrCreate(['slug' => 'hello-world-2'], [
            'name'        => 'Hello World 2',
            'description' => 'Second Hello World Project',
            'url'         => 'http://hello-world-2.com',
            'token'       => 'LYbggOGeifHHoKj38qjbYBajW92Q176mXWKD4xM2TjzhcwSlTn9hUEhTJw41',
        ]);

        // connect projects with user
        $User->projects()->sync([
            $HelloWorldProject_1->id,
            $HelloWorldProject_2->id,
        ]);
    }
}
