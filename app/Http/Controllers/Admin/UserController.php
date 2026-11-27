<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;

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

        // Security logging: privilege changes must be traceable (non-repudiation).
        Log::channel('security')->warning('admin.role_changed', [
            'admin_id' => auth()->id(),
            'target_user_id' => $user->id,
            'is_admin' => $user->is_admin,
            'ip' => request()->ip(),
        ]);

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
            'password'  => ['required', 'string', \Illuminate\Validation\Rules\Password::min(12)->mixedCase()->numbers()->uncompromised()],
            'is_admin'  => ['nullable', 'boolean'],
        ]);

        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);
        // is_admin is not mass-assignable: set it explicitly.
        $user->forceFill(['is_admin' => $request->boolean('is_admin')])->save();

        Log::channel('security')->notice('admin.user_created', [
            'admin_id' => auth()->id(),
            'new_user_id' => $user->id,
            'is_admin' => $user->is_admin,
            'ip' => $request->ip(),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol aangemaakt.');
    }
}
