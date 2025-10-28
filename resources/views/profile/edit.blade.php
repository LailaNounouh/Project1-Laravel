@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Bewerk je profiel</h1>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Gebruikersnaam</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="border rounded w-full p-2" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Voornaam</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="border rounded w-full p-2">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Familienaam</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="border rounded w-full p-2">
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1">E-mail</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="border rounded w-full p-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">GSM nummer</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="border rounded w-full p-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Geboortedatum</label>
                <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="border rounded w-full p-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Over mij</label>
                <textarea name="about" rows="4" class="border rounded w-full p-2">{{ old('about', $user->about) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Profielfoto</label>
                <input type="file" name="profile_photo" accept="image/*" class="border rounded w-full p-2">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Profielfoto" class="mt-3 w-32 h-32 rounded-full object-cover">
                @endif
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Opslaan
            </button>
            <a href="{{ route('profile.show') }}" class="ml-2 text-gray-600 hover:underline">Annuleren</a>
        </form>
    </div>
@endsection



