<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;
use Symfony\Component\HttpFoundation\Response;

/**
 * Adds HTTP security headers to every web response (fixes the ZAP DAST findings:
 * missing CSP, missing anti-clickjacking header, missing X-Content-Type-Options,
 * X-Powered-By information leak).
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $nonce = Vite::cspNonce();

        $csp = implode('; ', [
            "default-src 'self'",
            // 'unsafe-eval' is required by Alpine.js (standard build). Residual risk documented in the report.
            "script-src 'self' 'nonce-{$nonce}' 'unsafe-eval'",
            // 'unsafe-inline' is retained for inline display styles on Alpine components; external Bunny Fonts removed via self-hosting.
            "style-src 'self' 'unsafe-inline'",
            "font-src 'self'",
            "img-src 'self' data: https://via.placeholder.com",
            "connect-src 'self'",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'none'",
        ]);

        $response->headers->set('Content-Security-Policy', $csp);
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        if ($request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        $response->headers->remove('X-Powered-By');
        header_remove('X-Powered-By');

        return $response;
    }
}
