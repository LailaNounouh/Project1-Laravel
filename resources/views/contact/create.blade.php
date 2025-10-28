@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Contacteer ons</h1>

        {{-- Succesbericht --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-6 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Contactformulier --}}
        <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium">Naam:</label>
                <input type="text" name="name" id="name" class="border rounded w-full p-2">
            </div>

            <div>
                <label for="email" class="block font-medium">E-mail:</label>
                <input type="email" name="email" id="email" class="border rounded w-full p-2">
            </div>

            <div>
                <label for="message" class="block font-medium">Bericht:</label>
                <textarea name="message" id="message" rows="4" class="border rounded w-full p-2"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Verstuur</button>
        </form>
    </div>
@endsection



