<?php

namespace LaravelAdmin\Base;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    /**
     * Boot the package
     */
    public function boot()
    {
        // Load the views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        // Publish the config
        $this->publishes([__DIR__ . '/../resources/config/admin.php' => config_path('admin.php')], 'admin-config');

        // Load config file
        $this->mergeConfigFrom(__DIR__ . '/../resources/config/admin.php', 'admin');

        // Load packages migrations
        $this->loadMigrationsFrom(__DIR__ . '/../resources/migrations');

        // Define the basic gate for checking user roles
        Gate::define('has-role', function ($user, string $role) {
            return $user->role === $role;
        });

        // Administrator is a special user level that allows all actions
        Gate::before(function ($user) {
            if ($user->role === 'administrator') {
                return true;
            }
        });

        // View composer
        View::composer('admin::menu', \LaravelAdmin\Base\ViewComposers\Menu::class);
    }

    /**
     * Register the package options, like a facade
     */
    public function register()
    {
        $this->app->booting(function()
        {
            // Create alias
            $loader = AliasLoader::getInstance();
            $loader->alias('Admin', 'LaravelAdmin\Base\Facades\Admin');
        });
    }
}
