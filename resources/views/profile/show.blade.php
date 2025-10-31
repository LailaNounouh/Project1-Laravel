@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">{{ $user->name }}'s profiel</h1>

        @if($user->profile_photo)
            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profielfoto" class="rounded-full w-32 h-32 mb-4">
        @endif

        <p class="text-gray-700 mb-2"><strong>Email:</strong> {{ $user->email }}</p>
        <p class="text-gray-700 mb-2"><strong>Verjaardag:</strong> {{ $user->birthday ?? 'Niet ingevuld' }}</p>
        <p class="text-gray-700 mb-2"><strong>Over mij:</strong> {{ $user->about ?? 'Nog niets geschreven.' }}</p>

        @auth
            @if(Auth::id() === $user->id)
                <form method="POST" action="{{ route('profile.update') }}" class="mt-6 bg-white p-4 rounded shadow-md">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Naam:</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Verjaardag:</label>
                        <input type="date" name="birthday" value="{{ $user->birthday }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Over mij:</label>
                        <textarea name="about" rows="3" class="w-full border rounded p-2">{{ $user->about }}</textarea>
                    </div>

                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded">
                        💾 Opslaan
                    </button>
                </form>
            @endif
        @endauth
    </div>
@endsection




