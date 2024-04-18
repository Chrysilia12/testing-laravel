<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Check if the user is authenticated
        if (Auth::guard('admin')->check()) {
            // If authenticated, redirect to the home page
            // return redirect('/home');
        }

        // If not authenticated, allow the request to proceed
        return $next($request);
    }
}
