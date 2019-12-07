<?php

namespace Tjventurini\VoyagerProjects\Console\Commands;

use Illuminate\Console\Command;

class VoyagerProjectsInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voyager-projects:install {-- demo : Wether the demo content should be added or not.}
                        {-- force : Wether the whole project should be refreshed.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Voyager Projects Package.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Check options for force state.
     *
     * @return bool
     */
    private function force(): bool
    {
        return ($this->option('force'));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // check if we are in producton
        if (config('app.env') == 'production') {
            // if so, print error message
            $this->error('You are in production mode!');
            // terminate command with error state (>0)
            return 1;
        }

        // install voyager
        $this->installVoyager();

        // provision packages
        $this->provisionAssets();

        // run migrations
        $this->runMigrations();

        // run seeders
        $this->runSeeders();

        // clear cache
        $this->call('cache:clear');
    }

    /**
     * Install the voyager admin panel.
     *
     * @return void
     */
    private function installVoyager(): void
    {
        $this->call('voyager:install');
    }

    /**
     * Provision the assets.
     *
     * @return void
     */
    private function provisionAssets(): void
    {
        // projects
        $this->call('vendor:publish', [
            '--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider",
            '--tag' => 'config',
            '--force' => $this->force();
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider",
            '--tag' => 'views',
            '--force' => $this->force();
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider",
            '--tag' => 'lang',
            '--force' => $this->force();
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider",
            '--tag' => 'graphql',
            '--force' => $this->force();
        ]);
    }

    /**
     * Run migrations for this package.
     *
     * @return void
     */
    private function runMigrations(): void
    {
        // if force flag is set we want to refresh the migrations
        if ($this->force()) {
            $this->call('migrate:refresh');
            return;
        }

        // otherwise we run normal migrations
        $this->call('migrate');
    }

    /**
     * Run the seeders.
     *
     * @return void
     */
    private function runSeeders(): void
    {
        // voyager
        $this->call('db:seed', ['--class' => "VoyagerDatabaseSeeder"]);

        // projects
        $this->call('db:seed', ['--class' => "Tjventurini\VoyagerProjects\Seeds\VoyagerProjectsDatabaseSeeder"]);

        // install demo content
        if ($this->option('demo')) {
            // projects
            $this->call('db:seed', ['--class' => "Tjventurini\VoyagerProjects\Seeds\VoyagerProjectsDemoContentSeeder"]);
        }
    }
}
