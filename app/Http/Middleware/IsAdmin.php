<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (!auth()->user()->is_admin) {
            // Security logging: a non-admin tried to reach the admin panel.
            \Illuminate\Support\Facades\Log::channel('security')->warning('authz.admin_access_denied', [
                'user_id' => auth()->id(),
                'path' => $request->path(),
                'ip' => $request->ip(),
            ]);
            abort(403);
        }

        return $next($request);
    }

}
