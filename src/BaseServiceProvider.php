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

		//	Publish the MDB assets
		$this->publishes([
			   __DIR__.'/../resources/mdb' => public_path('mdb'),
		   ], 'public');
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

    public function routes() {
        return $this->app;
    }
}
