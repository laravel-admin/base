# Laravel Admin Interface

This package is in alpha state, use it in production on own risk.

##  Installation

Add this package directly with composer:

```
composer require laravel-admin/base
```

Add the service provider to your app.php config file

```
LaravelAdmin\Base\BaseServiceProvider::class,
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
