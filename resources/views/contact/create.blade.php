@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Contacteer ons</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 p-4 mb-6 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div>
                <label for="name" class="block font-semibold mb-1">Naam:</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    class="border border-gray-300 focus:border-pink-500 focus:ring-pink-500 rounded w-full p-2"
                    required>
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1">E-mail:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="border border-gray-300 focus:border-pink-500 focus:ring-pink-500 rounded w-full p-2"
                    required>
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block font-semibold mb-1">Bericht:</label>
                <textarea
                    name="message"
                    id="message"
                    rows="4"
                    class="border border-gray-300 focus:border-pink-500 focus:ring-pink-500 rounded w-full p-2"
                    required>{{ old('message') }}</textarea>
                @error('message')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 transition">
                💌 Verstuur
            </button>
        </form>
    </div>
@endsection


