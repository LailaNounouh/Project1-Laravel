<?php

/*
|--------------------------------------------------------------------------
| Security regression tests (assignment Software Security)
|--------------------------------------------------------------------------
| Each test proves that one of the vulnerabilities found during the threat
| model / SAST / DAST phase is fixed, and keeps it fixed in the future.
*/

use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    RateLimiter::clear('forms:127.0.0.1');
});

test('T1 stored XSS: news content is HTML-escaped', function () {
    $admin = User::factory()->create();
    $news = News::create([
        'title' => 'XSS test',
        'content' => '<script>alert(1)</script>',
        'published_at' => now(),
        'user_id' => $admin->id,
    ]);

    $this->get("/news/{$news->id}")
        ->assertOk()
        ->assertDontSee('<script>alert(1)</script>', false)
        ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false);
});

test('T2 DoS/spam: public contact form is rate limited to 5 per minute', function () {
    for ($i = 1; $i <= 5; $i++) {
        $this->post('/contact', ['name' => "n$i", 'email' => "a$i@example.com", 'message' => 'hello'])
            ->assertStatus(302);
    }

    $this->post('/contact', ['name' => 'n6', 'email' => 'a6@example.com', 'message' => 'hello'])
        ->assertStatus(429);
});

test('T3 DoS: oversized FAQ question is rejected', function () {
    $this->post('/faq', ['question' => str_repeat('A', 200000)])
        ->assertSessionHasErrors('question');

    $this->assertDatabaseCount('faq_questions', 0);
});

test('T4 spoofing: profile e-mail cannot be changed to another user\'s address', function () {
    $victim = User::factory()->create(['email' => 'victim@example.com']);
    $attacker = User::factory()->create();

    $this->actingAs($attacker)
        ->post('/profile/update', ['name' => 'x', 'email' => 'victim@example.com'])
        ->assertSessionHasErrors('email');

    expect($attacker->fresh()->email)->not->toBe('victim@example.com');
});

test('T5 changing e-mail resets verification', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/profile/update', ['name' => 'x', 'email' => 'new-address@example.com'])
        ->assertSessionHasNoErrors();

    expect($user->fresh()->email_verified_at)->toBeNull();
});

test('T6 elevation of privilege: is_admin cannot be mass-assigned', function () {
    $user = User::create([
        'name' => 'evil',
        'email' => 'evil@example.com',
        'password' => 'irrelevant',
        'is_admin' => true,
    ]);

    expect((bool) $user->fresh()->is_admin)->toBeFalse();
});

test('T7 elevation of privilege: non-admin gets 403 on admin panel', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get('/admin/users')->assertForbidden();
    $this->actingAs($user)->post("/admin/users/{$user->id}/toggle-admin")->assertForbidden();
});

test('T8 security headers are present on every page', function () {
    $this->get('/')
        ->assertHeader('X-Frame-Options', 'DENY')
        ->assertHeader('X-Content-Type-Options', 'nosniff')
        ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
        ->assertHeaderMissing('X-Powered-By');

    expect($this->get('/')->headers->get('Content-Security-Policy'))
        ->toContain("frame-ancestors 'none'")
        ->toContain("object-src 'none'");
});

test('T9 weak passwords are rejected at registration', function () {
    $this->post('/register', [
        'name' => 'Weak',
        'email' => 'weak@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])->assertSessionHasErrors('password');

    $this->assertGuest();
});
