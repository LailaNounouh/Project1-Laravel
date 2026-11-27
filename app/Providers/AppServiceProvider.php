<?php

namespace App\Providers;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->configureRateLimiting();
        $this->configurePasswordPolicy();
        $this->registerSecurityEventLogging();

        // CSP nonce for inline <script> tags and Vite-generated tags (see SecurityHeaders middleware).
        Vite::useCspNonce();

        // Force HTTPS URLs in production (secure transport, works together with HSTS).
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }

    /**
     * Rate limiting for public, unauthenticated forms (anti-spam / DoS / mail flooding).
     */
    private function configureRateLimiting(): void
    {
        RateLimiter::for('public-forms', function (Request $request) {
            return [
                Limit::perMinute(5)->by('forms:'.$request->ip())->response(function (Request $request) {
                    Log::channel('security')->warning('ratelimit.public_forms', [
                        'ip' => $request->ip(),
                        'path' => $request->path(),
                    ]);

                    return back()->withErrors(['throttle' => 'Too many submissions. Please try again later.'])
                        ->setStatusCode(429);
                }),
                Limit::perDay(50)->by('forms-day:'.$request->ip()),
            ];
        });

        RateLimiter::for('comments', function (Request $request) {
            return Limit::perMinute(10)->by('comments:'.($request->user()?->id ?: $request->ip()));
        });
    }

    /**
     * Central password policy, used by Password::defaults() in registration, reset and profile.
     */
    private function configurePasswordPolicy(): void
    {
        Password::defaults(function () {
            $rule = Password::min(12)->letters()->mixedCase()->numbers();

            return $this->app->environment('production') ? $rule->uncompromised() : $rule;
        });
    }

    /**
     * Security event logging: authentication events go to the dedicated 'security' channel.
     * Never log passwords, tokens or session ids.
     */
    private function registerSecurityEventLogging(): void
    {
        $ctx = fn () => [
            'ip' => request()->ip(),
            'user_agent' => substr((string) request()->userAgent(), 0, 200),
        ];

        Event::listen(Login::class, fn (Login $e) => Log::channel('security')->info('auth.login_success', ['user_id' => $e->user->getAuthIdentifier()] + $ctx()));

        Event::listen(Failed::class, fn (Failed $e) => Log::channel('security')->warning('auth.login_failed', [
            // only a hash of the attempted e-mail: lets you correlate attempts without storing personal data in clear text
            'email_hash' => hash('sha256', strtolower((string) ($e->credentials['email'] ?? ''))),
            'known_user' => $e->user !== null,
        ] + $ctx()));

        Event::listen(Lockout::class, fn (Lockout $e) => Log::channel('security')->alert('auth.lockout', [
            'email_hash' => hash('sha256', strtolower((string) $e->request->input('email'))),
        ] + $ctx()));

        Event::listen(Logout::class, fn (Logout $e) => Log::channel('security')->info('auth.logout', ['user_id' => $e->user?->getAuthIdentifier()] + $ctx()));

        Event::listen(Registered::class, fn (Registered $e) => Log::channel('security')->info('auth.registered', ['user_id' => $e->user->getAuthIdentifier()] + $ctx()));

        Event::listen(PasswordReset::class, fn (PasswordReset $e) => Log::channel('security')->notice('auth.password_reset', ['user_id' => $e->user->getAuthIdentifier()] + $ctx()));
    }
}
