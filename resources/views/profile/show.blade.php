@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-6 text-pink-600">
            Mijn profiel
        </h1>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">

            <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                <div>
                    <img
                        src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://via.placeholder.com/120' }}"
                        alt="Profielfoto"
                        class="w-28 h-28 rounded-full object-cover border border-gray-200 shadow-sm"
                    >
                </div>

                <div class="space-y-1">
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $user->name }}
                    </p>
                    <p class="text-sm text-gray-600">
                        {{ $user->email }}
                    </p>

                    @if($user->birthday)
                        <p class="text-sm text-gray-700">
                            Verjaardag: {{ $user->birthday }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="mt-6 border-t border-gray-100 pt-4">
                <h2 class="text-sm font-semibold text-gray-800 mb-2">
                    Over mij
                </h2>
                <p class="text-sm text-gray-700">
                    {{ $user->about ?? 'Er is nog geen beschrijving toegevoegd.' }}
                </p>
            </div>

            <div class="mt-6">
                <a href="{{ route('profile.edit') }}"
                   class="btn-glam text-sm">
                    Profiel bewerken
                </a>
            </div>

        </div>
    </div>
@endsection
