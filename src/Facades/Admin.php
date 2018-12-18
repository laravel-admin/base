<?php

namespace LaravelAdmin\Base\Facades;

use Route;

class Admin
{
    /**
     * Admin routes
     *
     * @param $callable
     */
    public static function routes($callable)
    {
        // Inside the web group middleware
        Route::group(['middleware' => 'web'], function () use ($callable) {
            // Admin listens only on specific domain or prefix "admin" for extra security measures
            Route::group(config('admin.route_group'), function () use ($callable) {
                Route::get('/login', ['uses' => '\LaravelAdmin\Base\Controllers\LoginController@showLoginForm'])->name('login');
                Route::post('login', ['uses' => '\LaravelAdmin\Base\Controllers\LoginController@login'])->name('attempt');

                Route::group(['middleware' => config('admin.route_middleware')], function () use ($callable) {
                    Route::get('logout', ['uses' => '\LaravelAdmin\Base\Controllers\LoginController@logout'])->name('logout');

                    // Extra user defined routes
                    call_user_func($callable);
                });
            });
        });
    }
}
