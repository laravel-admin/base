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
		if (!auth()->user()) return redirect()->route('admin.login');

		if (in_array(auth()->user()->role, config('admin.canlogin')) === false)
		{
			abort(403);
		}

        return $next($request);
    }
}
