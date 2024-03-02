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
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        }

        if ($request->is('seller') || $request->is('seller/*')) {
            return route('seller.login');
        }

        if ($request->is('buyer') || $request->is('buyer/*')) {
            return route('buyer.login');
        }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
