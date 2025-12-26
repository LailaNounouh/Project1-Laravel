@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-4">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-8">
            <h1 class="text-3xl font-bold text-pink-500 mb-6">Nieuwe gebruiker</h1>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded bg-red-50 text-red-700">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block font-medium mb-1">Naam</label>
                    <input name="name" required
                           class="w-full rounded-lg border-gray-300 dark:bg-gray-900">
                </div>

                <div>
                    <label class="block font-medium mb-1">E-mail</label>
                    <input type="email" name="email" required
                           class="w-full rounded-lg border-gray-300 dark:bg-gray-900">
                </div>

                <div>
                    <label class="block font-medium mb-1">Wachtwoord</label>
                    <input type="password" name="password" minlength="8" required
                           class="w-full rounded-lg border-gray-300 dark:bg-gray-900">
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_admin" value="1">
                    <label>Admin maken</label>
                </div>

                <div class="flex gap-3">
                    <button class="px-5 py-2 bg-pink-500 text-white rounded-lg">
                        Opslaan
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="px-5 py-2 bg-gray-200 rounded-lg">
                        Annuleren
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

