@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">FAQ</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-6 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        @forelse($faqs as $faq)
            <article class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold mb-2">{{ $faq->question }}</h2>
                <p class="text-gray-700">{{ $faq->answer }}</p>
            </article>
        @empty
            <p class="text-gray-500">Er zijn momenteel geen vragen beschikbaar.</p>
        @endforelse

        <hr class="my-8">

        <h2 class="text-2xl font-semibold mb-3">Stel je vraag</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('faq.question.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium mb-1">Naam (optioneel)</label>
                <input type="text" name="name" value="{{ old('name') }}" class="border rounded w-full p-2">
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">E-mail (optioneel)</label>
                <input type="email" name="email" value="{{ old('email') }}" class="border rounded w-full p-2">
                @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Je vraag</label>
                <textarea name="question" rows="4" class="border rounded w-full p-2" required>{{ old('question') }}</textarea>
                @error('question') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Verstuur je vraag
            </button>
        </form>
    </div>
@endsection

