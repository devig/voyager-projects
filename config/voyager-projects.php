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
        'user' => \App\User::class,
        'tags' => \Tjventurini\VoyagerProjects\Models\Tag::class,
        'tag' => \Tjventurini\VoyagerProjects\Models\Tag::class,
        'posts' => \Tjventurini\VoyagerPosts\Models\Post::class,
        'pages' => \Tjventurini\VoyagerPages\Models\Page::class,
        'content-block' => \Tjventurini\VoyagerContentBlocks\Models\ContentBlock::class,
        'projects' => \Tjventurini\VoyagerProjects\Models\Project::class,
    ],
   
    'tables' => [
        'users' => 'project_user',
        'user' => 'project_user',
        'tags' => 'project_tag',
        'tag' => 'project_tag',
        'pages' => 'page_project',
    ],

    'foreign_keys' => [
        'projects' => 'project_id',
        'project' => 'project_id',
        'users' => 'user_id',
        'user' => 'user_id',
        'tags' => 'tag_id',
        'tag' => 'tag_id',
        'pages' => 'page_id',
    ],
];
