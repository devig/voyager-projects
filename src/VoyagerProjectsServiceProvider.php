<?php

namespace Tjventurini\VoyagerProjects;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Tjventurini\VoyagerProjects\Models\Project;
use Tjventurini\VoyagerProjects\Observers\ProjectObserver;
use Tjventurini\VoyagerProjects\Actions\ProjectOpenUrlAction;
use Tjventurini\VoyagerProjects\Actions\ProjectSessionSelectAction;
use Tjventurini\VoyagerProjects\Console\Commands\VoyagerProjectsInstall;

class VoyagerProjectsServiceProvider extends ServiceProvider
{
    /**
     * Boot method of this service provider.
     *
     * @return void
     */
    public function boot()
    {
        // tell laravel where to find the migrations.
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');

        // tell laravel where to publish config if the user wants it to
        $this->publishes([
            __DIR__.'/../config' => config_path(),
        ], 'config');

        // tell laravel where to find the views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'projects');

        // tell laravel where to publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/voyager/projects'),
        ], 'views');

        // tell laravel where to find translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'projects');

        // tell laravel where to publish package translations
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/projects'),
        ], 'lang');

        // tell laravel where to publish package graphql schema
        $this->publishes([
            __DIR__.'/../graphql' => base_path('graphql'),
        ], 'graphql');

        // tell laravel where to find routes
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');

        // listen to project model events
        Project::observe(ProjectObserver::class);

        // register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                VoyagerProjectsInstall::class,
            ]);
        }

        // register voyager actions
        Voyager::addAction(ProjectSessionSelectAction::class);
        Voyager::addAction(ProjectOpenUrlAction::class);
    }

    /**
     * Register method of this service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
