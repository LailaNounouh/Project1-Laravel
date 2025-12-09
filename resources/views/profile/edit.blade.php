@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-6 text-pink-600">
            Profiel bewerken
        </h1>

        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form
            action="{{ route('profile.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white border border-gray-100 rounded-xl shadow-sm p-6 space-y-5"
        >
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Naam
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                >
                @error('name')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    E-mailadres
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                >
                @error('email')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Bio
                </label>
                <textarea
                    name="bio"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                >{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Profielfoto
                </label>
                <input
                    type="file"
                    name="profile_photo"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"
                >
                @if($user->profile_photo)
                    <img
                        src="{{ asset('storage/'.$user->profile_photo) }}"
                        alt="Profielfoto"
                        class="mt-3 w-24 h-24 rounded-full object-cover border border-gray-200"
                    >
                @endif
                @error('profile_photo')
                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button class="btn-glam text-sm">
                    Opslaan
                </button>

                <a href="{{ route('profile.show') }}"
                   class="text-sm text-gray-600 hover:underline">
                    Annuleren
                </a>
            </div>
        </form>

    </div>
@endsection
