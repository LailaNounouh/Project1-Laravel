@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Profiel bewerken</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
              class="bg-white shadow p-6 rounded-lg space-y-5">
            @csrf

            {{-- Naam --}}
            <div>
                <label class="block font-semibold mb-1">Naam</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border p-2 rounded">
            </div>

            {{-- Email --}}
            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full border p-2 rounded">
            </div>

            {{-- Bio --}}
            <div>
                <label class="block font-semibold mb-1">Bio</label>
                <textarea name="bio" rows="4"
                          class="w-full border p-2 rounded">{{ old('bio', $user->bio) }}</textarea>
            </div>

            {{-- Profielfoto --}}
            <div>
                <label class="block font-semibold mb-1">Profielfoto</label>
                <input type="file" name="profile_photo" accept="image/*" class="border rounded w-full p-2">

                @if($user->profile_photo)
                    <img src="{{ asset('storage/'.$user->profile_photo) }}"
                         class="mt-3 w-28 h-28 rounded-full object-cover shadow">
                @endif
            </div>

            {{-- Knoppen --}}
            <div class="flex items-center gap-3">
                <button class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                    Opslaan
                </button>

                <a href="{{ route('profile.show') }}" class="text-gray-600 hover:underline">
                    Annuleren
                </a>
            </div>

        </form>
    </div>
@endsection
