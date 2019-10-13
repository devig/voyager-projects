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
    protected $signature = 'voyager-projects:install {-- force : Wether the whole project should be refreshed.} {-- demo : Wether the demo content should be added or not.}';

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

        // collect information
        $force = $this->option('force');
        $demo = $this->option('demo');

        // install voyager
        $this->installVoyager();

        // provision packages
        $this->provisionPackages($force);

        // run migrations
        $this->runMigrations($force);

        // run seeders
        $this->runSeeders($demo);

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
     * Provision the packages.
     *
     * @param bool $force Force the provisioning of the given element.
     *
     * @return void
     */
    private function provisionPackages(bool $force = false): void
    {
        // projects
        $this->call('vendor:publish', [
            '--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider",
            '--tag' => 'config',
            '--force' => $force
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider",
            '--tag' => 'views',
            '--force' => $force
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider",
            '--tag' => 'lang',
            '--force' => $force
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider",
            '--tag' => 'graphql',
            '--force' => $force
        ]);
    }

    /**
     * Run migrations for this package.
     *
     * @param  bool|boolean $force
     *
     * @return void
     */
    private function runMigrations(bool $force = false): void
    {
        // if force flag is set we want to refresh the migrations
        if ($force) {
            $this->call('migrate:refresh');
            return;
        }

        // otherwise we run normal migrations
        $this->call('migrate');
    }

    /**
     * Run the seeders.
     *
     * @param bool $demo True when demo content should be installed.
     *
     * @return void
     */
    private function runSeeders(bool $demo = false): void
    {
        // voyager
        $this->call('db:seed', ['--class' => "VoyagerDatabaseSeeder"]);

        // projects
        $this->call('db:seed', ['--class' => "Tjventurini\VoyagerProjects\Seeds\VoyagerProjectsDatabaseSeeder"]);

        // install demo content
        if ($demo) {
            // projects
            $this->call('db:seed', ['--class' => "Tjventurini\VoyagerProjects\Seeds\VoyagerProjectsDemoContentSeeder"]);
        }
    }
}
