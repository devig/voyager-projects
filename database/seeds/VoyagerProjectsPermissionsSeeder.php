<?php

namespace Tjventurini\VoyagerProjects\Seeds;

use TCG\Voyager\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Permission;

class VoyagerProjectsPermissionsSeeder extends Seeder
{
    /**
     * Run the Seeder.
     *
     * @return void
     */
    public function run(): void
    {
        // wrap seeder in database transaction
        DB::transaction(function () {

            // get admin role
            $role = Role:: where('name', 'admin')->first();

            // check browse permission
            $browse = Permission::firstOrNew([
                'key' => 'browse_projects',
                'table_name' => 'projects',
            ]);
            if (!$browse->exists) {
                $browse->save();
                $role->permissions()->attach($browse);
            }

            // check read permission
            $read = Permission::firstOrNew([
                'key' => 'read_projects',
                'table_name' => 'projects',
            ]);
            if (!$read->exists) {
                $read->save();
                $role->permissions()->attach($read);
            }

            // check edit permission
            $edit = Permission::firstOrNew([
                'key' => 'edit_projects',
                'table_name' => 'projects',
            ]);
            if (!$edit->exists) {
                $edit->save();
                $role->permissions()->attach($edit);
            }

            // check add permission
            $add = Permission::firstOrNew([
                'key' => 'add_projects',
                'table_name' => 'projects',
            ]);
            if (!$add->exists) {
                $add->save();
                $role->permissions()->attach($add);
            }

            // check delete permission
            $delete = Permission::firstOrNew([
                'key' => 'delete_projects',
                'table_name' => 'projects',
            ]);
            if (!$delete->exists) {
                $delete->save();
                $role->permissions()->attach($delete);
            }
        });
    }
}
