@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-pink-600 mb-2">
                Veelgestelde vragen
            </h1>
            <p class="text-sm text-gray-600">
                Hier vind je antwoorden op de meest voorkomende vragen. Je kan onderaan ook zelf een vraag doorsturen.
            </p>
        </div>

        @auth
            @if(Auth::user()->is_admin)
                <div class="mb-6 flex flex-wrap gap-3">
                    <a href="{{ route('admin.faqs.index') }}" class="btn-glam text-sm">
                        FAQ beheren
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                       class="px-4 py-2 rounded-lg border border-gray-300 text-sm text-gray-700 hover:bg-gray-50">
                        Categorieën beheren
                    </a>
                </div>
            @endif
        @endauth

        {{-- Filter --}}
        <div class="mb-8 bg-white border border-gray-100 rounded-xl shadow-sm p-5">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                Filter op categorie
            </h2>

            <form method="GET" action="{{ route('faq.index') }}" class="flex flex-wrap gap-3 items-center">
                <select
                    name="category"
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm min-w-[200px] focus:outline-none focus:ring-2 focus:ring-pink-200"
                >
                    <option value="">Alle categorieën</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button class="btn-glam text-sm">
                    Toepassen
                </button>

                @if(request('category'))
                    <a href="{{ route('faq.index') }}"
                       class="text-xs text-gray-600 underline">
                        Filter wissen
                    </a>
                @endif
            </form>
        </div>

        {{-- FAQ lijst --}}
        <div class="space-y-4">
            @forelse($faqs as $faq)
                <div class="bg-white border border-gray-100 rounded-lg shadow-sm p-5">
                    <h3 class="text-lg font-semibold text-gray-900 mb-1">
                        {{ $faq->question }}
                    </h3>
                    <p class="text-sm text-gray-700 mb-2">
                        {{ $faq->answer }}
                    </p>
                    <p class="text-xs text-gray-500">
                        Categorie: {{ $faq->category->name ?? 'Algemeen' }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500 text-sm">
                    Er zijn nog geen FAQ-items beschikbaar.
                </p>
            @endforelse

            @if(method_exists($faqs, 'links'))
                <div class="pt-4">
                    {{ $faqs->links() }}
                </div>
            @endif
        </div>

        {{-- Vraag insturen --}}
        <div class="mt-10 bg-white border border-gray-100 rounded-xl shadow-sm p-6">
            <h2 class="text-xl font-semibold text-pink-600 mb-3">
                Stel een vraag
            </h2>

            <form action="{{ route('faq.store') }}" method="POST" class="space-y-3">
                @csrf

                <label for="question" class="block text-sm font-medium text-gray-700">
                    Je vraag
                </label>
                <textarea
                    id="question"
                    name="question"
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                    placeholder="Typ hier je vraag..."
                >{{ old('question') }}</textarea>

                @error('question')
                <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn-glam text-sm">
                    Versturen
                </button>
            </form>
        </div>

    </div>
@endsection
