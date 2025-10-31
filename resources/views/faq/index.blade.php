@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Veelgestelde vragen (FAQ)</h1>

        {{-- Succesbericht --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Lijst met vragen --}}
        @forelse($faqs as $faq)
            <article class="mb-8 border-b pb-6">
                <h2 class="text-2xl font-semibold mb-2 text-pink-600">❓ {{ $faq->question }}</h2>
                <p class="text-gray-700">{{ $faq->answer }}</p>
            </article>
        @empty
            <p class="text-gray-500">Er zijn momenteel geen vragen beschikbaar.</p>
        @endforelse

        {{-- Formulier om een vraag te stellen --}}
        <div class="mt-10 bg-white p-6 rounded shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Stel een vraag</h2>

            <form method="POST" action="{{ route('faq.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="question" class="block font-semibold mb-1">Je vraag:</label>
                    <textarea name="question" id="question" rows="4" class="border rounded w-full p-2" required>{{ old('question') }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-glam">Verstuur vraag</button>
                </div>
            </form>
        </div>
    </div>
@endsection


