@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-12">

        <h1 class="text-3xl font-bold mb-8 text-pink-600">
            Mijn profiel
        </h1>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8 border border-pink-50">


            <div class="flex items-start gap-6">

                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://via.placeholder.com/120' }}"
                     class="w-28 h-28 rounded-full object-cover shadow" />

                <div class="space-y-1">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $user->name }}
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $user->email }}
                    </p>

                    @if($user->birthday)
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-semibold">Verjaardag:</span> {{ $user->birthday }}
                        </p>
                    @endif
                </div>
            </div>


            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    Bio
                </h3>

                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ $user->about ?: 'Er is nog geen bio toegevoegd.' }}
                </p>
            </div>


            <div class="mt-8">
                <a href="{{ route('profile.edit') }}"
                   class="inline-block px-5 py-3 rounded-lg bg-pink-500 text-white shadow hover:bg-pink-600 transition">
                    Profiel bewerken
                </a>
            </div>

        </div>
    </div>
@endsection

