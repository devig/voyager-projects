<?php

namespace App;

// use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
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
        // static::addGlobalScope(new ProjectScope);
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
        $model = config('project.models.users');
        $table = config('project.tables.users');
        $project_id = config('project.foreign_keys.projects');
        $user_id = config('project.foreign_keys.users');

        return $this->belongsToMany($model, $table, $project_id, $user_id);
    }

    /**
     * Relationship with tag model.
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany The requested relationship.
     */
    public function tags(): BelongsToMany
    {
        $model = config('project.models.tags');
        $table = config('project.tables.tags');
        $project_id = config('project.foreign_keys.projects');
        $tag_id = config('project.foreign_keys.tags');

        return $this->belongsToMany($model, $table, $project_id, $tag_id);
    }

    /**
     * Relationship with post model.
     * @return Illuminate\Database\Eloquent\Relations\HasMany The requested relationship.
     */
    public function posts(): HasMany
    {
        $model = config('project.models.posts');
        $post_id = config('project.foreign_keys.posts');

        return $this->hasMany($model, $post_id);
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
