<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // return route('login');
            if ($request->is('admin') || $request->is('admin/*')) {
                // in case backend
                return route('admin.login-page');
            } elseif ($request->is('moderator') || $request->is('moderator/*')) 
            {
                // in case front end
                // return route('login-page');

            } else 
            {

            }
        }
    }
}
