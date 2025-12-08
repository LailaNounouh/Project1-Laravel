@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10">


        <h1 class="text-3xl font-bold mb-8 text-pink-600">
            Profiel bewerken
        </h1>


        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('profile.update') }}"
              method="POST"
              enctype="multipart/form-data"
              class="bg-white rounded-xl p-6 shadow space-y-6">

            @csrf


            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Naam</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-pink-300 focus:border-pink-400"
                >
            </div>


            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">E-mail</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-pink-300 focus:border-pink-400"
                >
            </div>


            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Bio</label>
                <textarea
                    name="bio"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-pink-300 focus:border-pink-400"
                >{{ old('bio', $user->bio) }}</textarea>
            </div>

            <!-- Profielfoto -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Profielfoto</label>

                <input
                    type="file"
                    name="profile_photo"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2"
                >

                @if($user->profile_photo)
                    <img
                        src="{{ asset('storage/' . $user->profile_photo) }}"
                        class="mt-4 w-28 h-28 rounded-full object-cover border shadow-sm"
                        alt="Profielfoto"
                    >
                @endif
            </div>

            <!-- Knoppen -->
            <div class="flex gap-4">
                <button class="px-5 py-2 rounded-lg text-white bg-pink-500 hover:bg-pink-600 transition">
                    Opslaan
                </button>

                <a href="{{ route('profile.show') }}"
                   class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition">
                    Annuleren
                </a>
            </div>

        </form>

    </div>
@endsection
