@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-10 px-4">

        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-pink-600 mb-2">
                Contact
            </h1>
            <p class="text-sm text-gray-600">
                Vragen over GlamConnect, ideeën of feedback? Laat je bericht achter via dit formulier.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">
            <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Naam
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                        required
                    >
                    @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        E-mail
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                        required
                    >
                    @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                        Bericht
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                        placeholder="Beschrijf kort waar je hulp bij nodig hebt..."
                        required
                    >{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="btn-glam text-sm">
                        Verstuur bericht
                    </button>
                </div>
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-gray-400">
            Je bericht wordt opgeslagen in het systeem. Een admin kan het bekijken in het beheerpaneel.
        </p>
    </div>
@endsection

