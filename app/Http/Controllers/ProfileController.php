<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Security fix: e-mail must be unique (ignoring the current user) to prevent
            // account confusion / a 500 error when another user's address is submitted.
            'email' => ['required', 'email:rfc', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'bio' => ['nullable', 'string', 'max:1000'],
            // Security fix: only allow real raster images (no SVG, which can contain scripts).
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'birthday' => ['nullable', 'date'],

            'category_ids' => ['array'],
            'category_ids.*' => ['integer', 'exists:categories,id'],
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profiles', 'public');
            $data['profile_photo'] = $path;
        }

        unset($data['category_ids']);

        // Security fix: a changed e-mail address must be verified again.
        $emailChanged = $data['email'] !== $user->email;

        $user->fill($data);
        if ($emailChanged) {
            $user->email_verified_at = null; // not mass-assignable, set explicitly
        }
        $user->save();

        if ($emailChanged) {
            Log::channel('security')->info('profile.email_changed', [
                'user_id' => $user->id,
                'ip' => $request->ip(),
            ]);
            $user->sendEmailVerificationNotification();
        }

        $user->categories()->sync(
            $request->input('category_ids', [])
        );

        return back()->with('success', 'Je profiel is bijgewerkt 💖');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            Log::channel('security')->warning('profile.password_change_failed', [
                'user_id' => auth()->id(),
                'ip' => $request->ip(),
            ]);

            return back()->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        Log::channel('security')->info('profile.password_changed', [
            'user_id' => auth()->id(),
            'ip' => $request->ip(),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
