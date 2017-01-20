# Laravel Admin Interface

This package is experimental, don't use it for production.

##  Installation

This package is not yet available with packagist, so you have to create a repositories section in you composer.json file.

```
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/laravel-admin/base"
        }
]
```

Now you can add the package with composer

```
composer require laravel-admin/base
```

Add the service provider to your app.php config file

```
LaravelAdmin\Base\BaseServiceProvider::class,
```

Add the Alias to your aliasses in the app.php 

```
'Admin'	=>	LaravelAdmin\Base\Facades\Admin::class,
```

Scaffold your base admin routes within your routes/web.php file

```
Admin::routes(function()
{
	//  Add your routes
});
```

Publish the public assets for the inferface to you public folder

```
php artisan vendor:publish --tag=public --force
```
