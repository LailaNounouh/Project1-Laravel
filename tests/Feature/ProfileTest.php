<?php

use App\Models\User;

test('profile page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/profile');

    $response->assertOk();
});

test('profile information can be updated', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->from('/profile/edit')
        ->post('/profile/update', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile/edit');

    $user->refresh();

    $this->assertSame('Test User', $user->name);
    $this->assertSame('test@example.com', $user->email);
    $this->assertNull($user->email_verified_at);
});

test('email verification status is unchanged when the email address is unchanged', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->from('/profile/edit')
        ->post('/profile/update', [
            'name' => 'Test User',
            'email' => $user->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile/edit');

    $this->assertNotNull($user->refresh()->email_verified_at);
});

// Self-service account deletion (DELETE /profile) and Breeze PATCH /profile are intentionally
// not implemented in routes/web.php or ProfileController; verify they remain disabled (405).
test('legacy Breeze PATCH and DELETE /profile endpoints are disabled', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->patch('/profile', ['name' => 'Test', 'email' => 'new@example.com'])
        ->assertStatus(405);

    $this->actingAs($user)
        ->delete('/profile', ['password' => 'password'])
        ->assertStatus(405);

    $this->assertNotNull($user->fresh());
});
