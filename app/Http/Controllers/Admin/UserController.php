<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        // voorkom dat admin zichzelf zijn rechten afneemt
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Je kan je eigen admin-rechten niet wijzigen.');
        }

        $user->is_admin = ! $user->is_admin;
        $user->save();

        return back()->with('success', 'Admin-rechten bijgewerkt.');
    }
}
