<?php

namespace Tjventurini\VoyagerProjects\Seeds;

use App\User;
use Illuminate\Database\Seeder;
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
        $Admin = $this->admin();
        $this->projects($Admin);
        $this->users();
    }

    /**
     * @return mixed
     */
    private function admin(): User
    {
        // create user
        $Admin = User::firstOrCreate(['email' => 'admin@admin.com'], [
            'name'     => 'Admin',
            'password' => Hash::make('password'),
            'role_id'  => 1,
        ]);

        return $Admin;
    }

    /**
     * @param $Admin
     */
    private function projects($Admin): void
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
        $Admin->projects()->sync([
            $HelloWorldProject_1->id,
            $HelloWorldProject_2->id,
        ]);
    }

    /**
     * Create demo users.
     *
     * @return void
     */
    private function users(): void
    {
        // create users
        $John = User::firstOrCreate(['email' => 'john.doe@example.com'], [
            'name'     => 'John Doe',
            'password' => Hash::make('password'),
            'role_id'  => 1,
        ]);
        $Jane = User::firstOrCreate(['email' => 'jane.doe@example.com'], [
            'name'     => 'Jane Doe',
            'password' => Hash::make('password'),
            'role_id'  => 2,
        ]);

        // assign users to projects
        $John->projects()->sync([1]);
        $Jane->projects()->sync([2]);
    }
}
