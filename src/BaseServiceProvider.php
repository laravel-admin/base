<?php

namespace LaravelAdmin\Base;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

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
