<?php

/*
|--------------------------------------------------------------------------
| Voyager Projects Configuration
|--------------------------------------------------------------------------
|
| In this configuration file you will find all options for this package.
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | In this section you will find all options for the relationships of this
    | model.
    |
    */

    'models' => [
        'user'    => \App\User::class,
        'project' => \Tjventurini\VoyagerProjects\Models\Project::class,
    ],

    'tables' => [
        // pivot tables
        'user' => 'project_user',
    ],

    'foreign_keys' => [
        'project' => 'project_id',
        'user'    => 'user_id',
    ],

    /*
     |--------------------------------------------------------------------------
     | UserScope
     |--------------------------------------------------------------------------
     |
     | In this section you will find the configuration options for the user
     | scope in place.
     |
     */

    'user_scope' => [
        'ignored_groups' => [
            'admin',
        ],
    ],
];
