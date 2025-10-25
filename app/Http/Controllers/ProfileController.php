<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show a user's profile.
     */
    public function show(User $user): View
    {
        return view('profile.show', [
            'user' => $user,
        ]);
    }

    /**
     * Display the authenticated user's profile edit form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the authenticated user's profile information (basic).
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'about' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->username = $validated['username'];
        $user->birthday = $validated['birthday'] ?? null;
        $user->about = $validated['about'] ?? null;

        if ($user->email !== $validated['email']) {
            $user->email = $validated['email'];
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profiel succesvol bijgewerkt!');
    }

    /**
     * Delete the authenticated user's account.
     */
    public function destroy(Request $request)
    {
    }
}
