@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">{{ $user->name }}'s Profiel</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
            @if($user->profile_photo)
                <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Profielfoto" class="w-32 h-32 rounded-full object-cover mb-4">
            @endif

            <p><strong>Naam:</strong> {{ $user->first_name ?? 'Niet ingevuld' }}</p>
            <p><strong>Familienaam:</strong> {{ $user->last_name ?? 'Niet ingevuld' }}</p>
            <p><strong>E-mail:</strong> {{ $user->email }}</p>
            <p><strong>GSM nummer:</strong> {{ $user->phone ?? 'Niet ingevuld' }}</p>
            <p><strong>Geboortedatum:</strong> {{ $user->birthday ?? 'Niet ingevuld' }}</p>
            <p><strong>Over mij:</strong> {{ $user->about ?? 'Nog niets geschreven.' }}</p>
        </div>

        @auth
            @if(Auth::id() === $user->id)
                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Bewerk profiel
                    </a>
                </div>
            @endif
        @endauth
    </div>
@endsection
