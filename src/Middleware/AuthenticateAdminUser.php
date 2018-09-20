<?php

namespace LaravelAdmin\Base\Middleware;

use Closure;

class AuthenticateAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // By failed attempt redirect to the login
        if (!auth()->user()) {
            return redirect()->route('admin.login');
        }

        // Check if the user can login to the admin
        if (in_array(auth()->user()->role, config('admin.canLogin')) === false) {
            abort(403);
        }

        return $next($request);
    }
}
