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

		$this->publishes([
	        __DIR__.'/../resources/config/admin.php' => config_path('admin.php'),
	    ], 'admin-config');

		$this->mergeConfigFrom(
        	__DIR__.'/../resources/config/admin.php', 'admin'
    	);

		 $this->loadMigrationsFrom(__DIR__.'/../resources/migrations');
    }

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
