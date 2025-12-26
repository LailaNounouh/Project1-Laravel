@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">User Management</h1>

        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 text-red-600">
                {{ session('error') }}
            </div>
        @endif

        <table class="w-full border-collapse bg-white rounded-lg shadow">
            <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-4">Name</th>
                <th class="p-4">Email</th>
                <th class="p-4">Role</th>
                <th class="p-4">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr class="border-t">
                    <td class="p-4">{{ $user->name }}</td>
                    <td class="p-4">{{ $user->email }}</td>
                    <td class="p-4">
                        @if($user->is_admin)
                            <span class="text-green-600 font-semibold">Admin</span>
                        @else
                            <span class="text-gray-600">User</span>
                        @endif
                    </td>
                    <td class="p-4">
                        <form method="POST" action="{{ route('admin.users.toggleAdmin', $user) }}">
                            @csrf
                            @method('PATCH')

                            <button
                                class="px-4 py-2 rounded text-white
                                    {{ $user->is_admin ? 'bg-red-500' : 'bg-pink-500' }}">
                                {{ $user->is_admin ? 'Remove admin' : 'Make admin' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
