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
    </div>
@endsection
