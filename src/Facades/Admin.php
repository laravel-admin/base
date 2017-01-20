<?php

namespace LaravelAdmin\Base\Facades;

use LaravelAdmin\BaseServiceProvider as Provider;
use Route;

class Admin {

    public static function routes($callable)
    {
        // Inside the web group middleware
        Route::group(['middleware' => 'web'], function() use($callable) {
            $options = (env('APP_ADMIN_URL') ? ['domain' => env('APP_ADMIN_URL')] : ['prefix' => 'admin']);
            $options['as'] = 'admin.';

            // Admin listens only on specific domain or prefix "admin" for extra security measures
            Route::group($options, function() use($callable) {
                Route::get('/',       ['uses' => '\LaravelAdmin\Base\Controllers\LoginController@showLoginForm'])->name('login');
                Route::post('login',  ['uses' => '\LaravelAdmin\Base\Controllers\LoginController@login'])->name('attempt');
                Route::get('logout', ['uses' => '\LaravelAdmin\Base\Controllers\LoginController@logout'])->name('logout');

                // Extra routes
                call_user_func($callable);
            });
        });
    }
}
