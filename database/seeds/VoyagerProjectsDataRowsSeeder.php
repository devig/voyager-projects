<?php

namespace Tjventurini\VoyagerProjects\Seeds;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use Illuminate\Support\Facades\DB;

class VoyagerProjectsDataRowsSeeder extends Seeder
{
    /**
     * Run the voyager projects package database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            // get the data type
            $data_type = DataType::where('slug', 'projects')->firstOrFail();

            // field id
            $field_id = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'id',
            ], [
                'type' => 'hidden',
                'display_name' => trans('projects::projects.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field name
            $field_name = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'name',
            ], [
                'type' => 'text',
                'display_name' => trans('projects::projects.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field description
            $field_description = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'description',
            ], [
                'type' => 'text_area',
                'display_name' => trans('projects::projects.data_rows.description'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field slug
            $field_slug = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'slug',
            ], [
                'type' => 'text',
                'display_name' => trans('projects::projects.data_rows.slug'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field url
            $field_url = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'url',
            ], [
                'type' => 'text',
                'display_name' => trans('projects::projects.data_rows.url'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field token
            $field_token = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'token',
            ], [
                'type' => 'text_area',
                'display_name' => trans('projects::projects.data_rows.token'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field created_at
            $field_created_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'created_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('projects::projects.data_rows.created_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);

            // field updated_at
            $field_updated_at = DataRow::updateOrCreate([
                'data_type_id' => $data_type->id,
                'field' => 'updated_at',
            ], [
                'type' => 'timestamp',
                'display_name' => trans('projects::projects.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 1,
                'details' => json_encode([]),
                'order' => 1,
            ]);
        });
    }
}
