# Laravel Admin Interface

Extend your Laravel App with an admin interface out-of-the-box. This packages creates an admin including a login page. The interface is fully compatible with the default bootstrap interface which is included in your Laravel app.

> note: This package is in alpha state, use it in production on own risk.

##  Installation

Add this package directly with composer:

```
composer require laravel-admin/base
```

Add the service provider to your app.php config file

```
LaravelAdmin\Base\BaseServiceProvider::class,
```

Add the admin middleware in app/Http/Kernel.php file in the $routeMiddleware array.

```
'auth.admin' => \LaravelAdmin\Base\Middleware\AuthenticateAdminUser::class
```

## Config

The admin package includes a database migration which adds a role field to your users table. So make sure you run the artisan migrate command.

You can publish the config, so you can manage this in config/admin.php.

```
php artisan vendor:publish --tag=admin-config
```

### Config options

#### route_group
Defining the properties of all admin routes. By default all routes are separated on a specific domain which you can define as ADMIN_URL in your .env file. But is is also possible to use a subdirectory to replace the domain property by a prefix property like 'admin'.

#### route_middleware
Definition of the middleware what will be used after login. By default you can use the middleware above.

#### roles
Array with the available user roles. 

#### canlogin
Array with the roles who can login in the admin

#### js
Array of js files which will be added to the admin interface

#### css
Array of css files which will be added to the admin interface

#### menu
Your admin menu structure. Fill this array with items that have a name and url attribute. For a second level you can give an item the attribute children to build a subarray with submenu items.

## Usage

Scaffold your base admin routes within your routes/web.php file

```
Admin::routes(function()
{
	//  Add your routes
});
```

Within the closure you can add all your routes on a route group type of definition.

Now you can access the admin by entering the url as defined in the config. Like http://admin.mydomain.com or http://mydomain.com/admin

