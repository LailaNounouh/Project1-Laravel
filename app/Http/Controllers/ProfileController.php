<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show a user's profile.
     */
    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
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
     * Update the authenticated user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Validatie van de input
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'about' => 'nullable|string',
            'profile_photo' => 'nullable|image|max:2048',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Basisgegevens bijwerken
        $user->username = $validated['username'];
        $user->birthday = $validated['birthday'] ?? null;
        $user->about = $validated['about'] ?? null;

        // Email check: als veranderd, zet verified_at op null
        if ($user->email !== $validated['email']) {
            $user->email = $validated['email'];
            $user->email_verified_at = null;
        }

        // Profielfoto uploaden
        if ($request->hasFile('profile_photo')) {
            // Oude foto verwijderen
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos');
            $user->profile_photo = $path;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profiel succesvol bijgewerkt!');
    }

    /**
     * Delete the authenticated user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Account succesvol verwijderd.');
    }
}
