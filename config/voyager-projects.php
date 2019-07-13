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
        'users' => \App\User::class,
        'tags' => \Tjventurini\VoyagerTags\Models\Tag::class,
        'posts' => \Tjventurini\VoyagerPosts\Models\Post::class,
    ],
   
    'tables' => [
        'users' => 'project_user',
        'tags' => 'project_tag',
    ],

    'foreign_keys' => [
        'projects' => 'project_id',
        'project' => 'project_id',
        'users' => 'user_id',
        'tags' => 'tag_id',
    ],
];
