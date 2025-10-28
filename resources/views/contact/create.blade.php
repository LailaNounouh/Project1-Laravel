@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Contacteer ons</h1>

        {{-- Succesbericht --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 p-4 mb-6 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Contactformulier --}}
        <form method="POST" action="{{ route('contact.store') }}" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            @csrf

            {{-- Naam --}}
            <div>
                <label for="name" class="block font-semibold mb-1">Naam:</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    class="border border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded w-full p-2"
                    required
                >
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- E-mail --}}
            <div>
                <label for="email" class="block font-semibold mb-1">E-mail:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="border border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded w-full p-2"
                    required
                >
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Bericht --}}
            <div>
                <label for="message" class="block font-semibold mb-1">Bericht:</label>
                <textarea
                    name="message"
                    id="message"
                    rows="4"
                    class="border border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded w-full p-2"
                    required
                >{{ old('message') }}</textarea>
                @error('message')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{--  Verbeterde Verstuur-knop  --}}
            <button
                type="submit"
                style="background-color:#2563eb; color:white; padding:10px 20px; border:none; border-radius:6px; font-weight:600; cursor:pointer;"
                onmouseover="this.style.backgroundColor='#1d4ed8'"
                onmouseout="this.style.backgroundColor='#2563eb'">
                Verstuur
            </button>
        </form>
    </div>
@endsection

