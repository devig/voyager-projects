<?php

namespace Tjventurini\VoyagerProjects\Seeds;

use Illuminate\Database\Seeder;

class VoyagerProjectsDatabaseSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VoyagerProjectsPermissionsSeeder::class);
        $this->call(VoyagerProjectsDataTypesSeeder::class);
        $this->call(VoyagerProjectsDataRowsSeeder::class);
        $this->call(VoyagerProjectsMenuItemsSeeder::class);
    }
}
