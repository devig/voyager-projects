<?php

namespace Tjventurini\VoyagerProjects\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use Illuminate\Support\Facades\DB;

class VoyagerProjectsDataTypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            // create or update projects data type
            $projects = DataType::updateOrCreate([
                'slug' => 'projects',
            ], [
                'name' => 'projects',
                'display_name_singular' => trans('projects::projects.label_singular'),
                'display_name_plural' => trans('projects::projects.label_plural'),
                'icon' => 'voyager-tag',
                'model_name' => \Tjventurini\VoyagerProjects\Models\Project::class,
                'policy_name' => null,
                'controller' => \Tjventurini\VoyagerProjects\Http\Controllers\ProjectsController::class,
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => null,
            ]);
        });
    }
}
