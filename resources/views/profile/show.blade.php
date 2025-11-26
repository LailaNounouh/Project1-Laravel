@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10">

        <!-- ⭐ Consistente Pagina Titel -->
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Mijn profiel</h1>

        <div class="bg-white shadow p-6 rounded-lg">

            <div class="flex items-center gap-6">
                <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://via.placeholder.com/120' }}"
                     class="w-28 h-28 rounded-full object-cover shadow" />

                <div>
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>

                    @if($user->birthday)
                        <p class="text-gray-700 mt-2">
                            <strong>Verjaardag:</strong> {{ $user->birthday }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold">Bio</h3>
                <p class="text-gray-700">
                    {{ $user->about ?? 'Geen bio toegevoegd.' }}
                </p>
            </div>

            <a href="{{ route('profile.edit') }}"
               class="mt-6 inline-block bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                Profiel bewerken
            </a>

        </div>
    </div>
@endsection
