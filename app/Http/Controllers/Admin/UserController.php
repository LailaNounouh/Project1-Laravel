<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('admin.users.index', compact('users'));
    }


    public function toggleAdmin(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Je kan je eigen admin-rechten niet wijzigen.');
        }

        $user->is_admin = ! $user->is_admin;
        $user->save();

        return back()->with('success', 'Admin-rechten bijgewerkt.');
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'  => ['required', 'string', 'min:8'],
            'is_admin'  => ['nullable'],
        ]);

        User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'is_admin'  => $request->boolean('is_admin'),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol aangemaakt.');
    }
}
