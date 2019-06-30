# Voyager Projects

This package provides a basic model and views for the [laravel voyager](https://laravelvoyager.com) admin panel.

*Note:* This package does not use the hooks extension management from voyager.

# Installation

You can install this package using composer.

```bash
composer require tjventurini/voyager-projects 
```

This package needs to have the `voyager.prefix` settings available in the voyager configuration file. Put the following to the top of your voyager configuration file configuration.

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Voyager Prefix
    |--------------------------------------------------------------------------
    |
    | The global voyager prefix (eg. `admin`). Make sure that it is the same
    | slug, as in voyager.user.redirect setting below.
    |
    */
    
    'prefix' => 'admin',

    ...
```

You will need to publish the assets of this package to overwrite the things you need. Here is a list of all available publishable resources as the commands needed to publish them.

```bash
php artisan vendor:publish --provider="Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider" --tag=config
php artisan vendor:publish --provider="Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider" --tag=views
php artisan vendor:publish --provider="Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider" --tag=lang
php artisan vendor:publish --provider="Tjventurini\VoyagerProjects\VoyagerProjectsServiceProvider" --tag=graphql
```

Now run the migrations.

```bash
php artisan migrate
```

You will also need to run the seeders to ensure that permissions and other database requirements are met.

```bash
php artisan db:seed --class="Tjventurini\VoyagerProjects\Seeds\VoyagerProjectsDatabaseSeeder"
```