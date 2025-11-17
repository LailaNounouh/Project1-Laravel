@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6 text-pink-600">Veelgestelde vragen (FAQ)</h1>

        {{-- Filter op categorie --}}
        <form method="GET" action="{{ route('faq.index') }}" class="mb-6 flex items-center gap-3">
            <label class="font-semibold">Categorie:</label>

            <select name="category" class="border rounded p-2">
                <option value="">Alle categorieën</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <button class="btn-glam">Filter</button>

            @if(request('category'))
                <a href="{{ route('faq.index') }}" class="underline ml-2 text-gray-700">Reset</a>
            @endif
        </form>

        {{-- Admin beheer knoppen --}}
        @auth
            @if(Auth::user()->is_admin)
                <div class="mb-6 flex gap-3">

                    <a href="{{ route('admin.faqs.index') }}"
                       class="btn-glam">
                        ✏️ FAQ beheren
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                       class="btn-glam">
                        📁 Categorieën beheren
                    </a>

                </div>
            @endif
        @endauth

        {{-- FAQ lijst --}}
        @forelse($faqs as $faq)
            <article class="mb-8 border-b pb-6">
                <h2 class="text-2xl font-semibold mb-2 text-pink-600">
                    ❓ {{ $faq->question }}
                </h2>

                <p class="text-gray-700">{{ $faq->answer }}</p>

                <p class="text-sm text-gray-500 mt-1">
                    Categorie:
                    <span class="font-semibold">
                    {{ $faq->category->name ?? '—' }}
                </span>
                </p>
            </article>
        @empty
            <p class="text-gray-500">Er zijn momenteel geen vragen beschikbaar.</p>
        @endforelse

        {{-- Vraag insturen --}}
        <div class="mt-10 p-6 bg-white rounded shadow">
            <h3 class="text-xl font-semibold mb-3">❔ Stel een vraag</h3>

            <form method="POST" action="{{ route('faq.store') }}">
                @csrf

                <label for="question" class="block font-semibold mb-1">Je vraag</label>
                <textarea name="question" id="question" rows="4"
                          class="w-full border rounded p-2 mb-3" required>{{ old('question') }}</textarea>

                <button type="submit" class="btn-glam">Verstuur vraag</button>
            </form>
        </div>

    </div>
@endsection
