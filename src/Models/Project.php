<?php

namespace Tjventurini\VoyagerProjects\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Tjventurini\VoyagerProjects\Scopes\UsersScope;

class Project extends Model
{
    use Sluggable;

    protected $guarded = ['id'];

    /*
    |--------------------------------------------------------------------------
    | Overwrite the Model::boot() Method
    |--------------------------------------------------------------------------
    |
    | In this model we overwrite the Model::boot() method to apply global
    | scopes.
    |
    */

    /**
     * The "booting" method of this model.
     *
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        // apply scopes
        static::addGlobalScope(new UsersScope);
    }

    /*
    |--------------------------------------------------------------------------
    | Sluggable
    |--------------------------------------------------------------------------
    |
    | In this section you will find the settings for the Sluggable Trait.
    |
    */

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}
