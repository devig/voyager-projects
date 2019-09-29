<?php

namespace Tjventurini\VoyagerProjects\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Tjventurini\VoyagerProjects\Scopes\UsersScope;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    | Relationships
    |--------------------------------------------------------------------------
    |
    | In this section you will find all relationships of this model.
    |
    */
    
    /**
     * Relationship with user model.
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany The requested relationship.
     */
    public function users(): BelongsToMany
    {
        $model = config('voyager-projects.models.users');
        $table = config('voyager-projects.tables.users');
        $project_id = config('voyager-projects.foreign_keys.projects');
        $user_id = config('voyager-projects.foreign_keys.users');

        return $this->belongsToMany($model, $table, $project_id, $user_id);
    }

    /**
     * Relationship with tag model.
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany The requested relationship.
     */
    public function tags(): BelongsToMany
    {
        $model = config('voyager-projects.models.tags');
        $table = config('voyager-projects.tables.tags');
        $project_id = config('voyager-projects.foreign_keys.projects');
        $tag_id = config('voyager-projects.foreign_keys.tags');

        return $this->belongsToMany($model, $table, $project_id, $tag_id);
    }

    /**
     * Relationship with post model.
     * @return Illuminate\Database\Eloquent\Relations\HasMany The requested relationship.
     */
    public function posts(): HasMany
    {
        $model = config('voyager-projects.models.posts');
        $project_id = config('voyager-projects.foreign_keys.project');

        return $this->hasMany($model, $project_id);
    }

    /**
     * Relationship with page model.
     * @return Illuminate\Database\Eloquent\Relations\HasMany The requested relationship.
     */
    public function pages(): HasMany
    {
        $model = config('voyager-projects.models.pages');
        $project_id = config('voyager-projects.foreign_keys.projects');

        return $this->hasMany($model, $project_id);
    }

    /**
     * Relationship with contentBlock model.
     * @return Illuminate\Database\Eloquent\Relations\HasMany The requested relationship.
     */
    public function contentBlocks(): HasMany
    {
        $model = config('voyager-projects.models.content-blocks');
        $project_id = config('voyager-projects.foreign_keys.projects');

        return $this->hasMany($model, $project_id);
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
                'source' => 'name'
            ]
        ];
    }
}
