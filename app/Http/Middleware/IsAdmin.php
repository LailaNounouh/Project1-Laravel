<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || (int) auth()->user()->is_admin !== 1) {
            abort(404);
        }

        return $next($request);
    }
}
