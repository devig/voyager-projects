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

After updating the voyager configuration, you can just call the `install` command of this package.

```bash
php artisan voyager-projects:install
```

If you want to install voyager or the demo content with it, you can add the following flags.

```bash
php artisan voyager-projects:install --voyager --demo
```

If you ever need to republish all assets of this package, you can use the `--force` flag for that.

```shell script
php artisan voyager-projects:install --force
```

Of course you can combine all of these flags.

