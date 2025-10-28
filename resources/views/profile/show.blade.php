@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">{{ $user->name }}'s profiel</h1>

        @if($user->profile_photo)
            <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Profielfoto" width="150" class="rounded mb-4">
        @endif

        <p><strong>Verjaardag:</strong> {{ $user->birthday ?? 'Niet ingevuld' }}</p>
        <p><strong>Over mij:</strong> {{ $user->about ?? 'Nog niets geschreven.' }}</p>

        @auth
            @if(Auth::id() === $user->id)
                <div class="mt-4">
                    <a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Bewerk profiel</a>
                </div>
            @endif
        @endauth
    </div>
@endsection
