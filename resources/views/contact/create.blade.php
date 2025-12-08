@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-12">

        <h1 class="text-3xl font-bold mb-6 text-pink-600 text-center">
            Contact
        </h1>

        <div class="text-center mb-10">
            <h2 class="text-4xl font-extrabold mb-2">
                <span class="text-pink-500">Glam</span><span class="text-gray-800">Connect</span>
            </h2>

            <p class="text-gray-600">
                Heb je een vraag of wil je iets met ons delen? Laat hier je bericht achter.
            </p>
        </div>

        {{-- Succesmelding --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-green-100 border border-green-200 px-4 py-3 text-sm text-green-800 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulier --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 border border-pink-50">
            <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                @csrf

                {{-- Naam --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                        Naam
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-100 px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-400"
                        placeholder="Hoe mogen we je aanspreken?"
                        required
                    >
                    @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                        E-mail
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-100 px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-400"
                        placeholder="jij@example.com"
                        required
                    >
                    @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bericht --}}
                <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                        Bericht
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-100 px-3 py-2
                               focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-400"
                        placeholder="Vertel ons waar je hulp bij nodig hebt..."
                        required
                    >{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Verstuur --}}
                <div class="pt-2">
                    <button type="submit"
                            class="px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white rounded-xl shadow transition">
                        Verstuur bericht
                    </button>
                </div>

            </form>
        </div>

        <p class="mt-6 text-center text-xs text-gray-400">
            We reageren zo snel mogelijk.
        </p>

    </div>
@endsection
