<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Update the user's profile information.
     */
    public function update(Request $request)
    {

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {

    }
}
