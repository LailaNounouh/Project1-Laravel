<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'about' => 'nullable|string|max:500',
        ]);

        $user->update($request->only('name', 'birthday', 'about'));

        return back()->with('success', 'Profiel succesvol bijgewerkt!');
    }
}

