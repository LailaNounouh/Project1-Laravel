@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">

        <!-- ⭐ Consistente Titel -->
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Veelgestelde vragen (FAQ)</h1>

        <!-- Admin beheer knoppen -->
        @if(auth()->check() && auth()->user()->is_admin)
            <div class="flex flex-wrap gap-4 mb-10 mt-2">
                <a href="{{ route('admin.faqs.index') }}"
                   class="px-5 py-2.5 rounded-xl text-sm font-semibold text-white
                          shadow-md bg-gradient-to-r from-pink-500 to-pink-400
                          hover:from-pink-600 hover:to-pink-500 transition-all duration-200">
                    ✏️ FAQ beheren
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="px-5 py-2.5 rounded-xl text-sm font-semibold text-white
                          shadow-md bg-gradient-to-r from-purple-500 to-purple-400
                          hover:from-purple-600 hover:to-purple-500 transition-all duration-200">
                    📁 Categorieën beheren
                </a>
            </div>
        @endif

        <!-- Categorie filter -->
        <div class="bg-white shadow-sm rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
                🔍 Filter op categorie
            </h2>

            <form method="GET" action="{{ route('faq.index') }}" class="flex flex-wrap gap-4">
                <select name="category"
                        class="border border-gray-300 rounded-lg px-4 py-2 min-w-[200px] focus:ring focus:ring-pink-300">
                    <option value="">Alle categorieën</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn-glam">
                    Filter
                </button>

                @if(request('category'))
                    <a href="{{ route('faq.index') }}"
                       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- FAQ Overzicht -->
        <div class="space-y-6">
            @forelse($faqs as $faq)
                <div class="bg-white shadow-sm rounded-lg p-6 border-l-4 border-pink-400">
                    <h3 class="text-xl font-bold mb-2 flex items-center gap-2">
                        ❓ {{ $faq->question }}
                    </h3>

                    <p class="text-gray-700 mb-2">{{ $faq->answer }}</p>

                    <p class="text-sm text-gray-500 flex items-center gap-1">
                        📂 <span class="font-medium">{{ $faq->category->name ?? 'Algemeen' }}</span>
                    </p>
                </div>
            @empty
                <p class="text-gray-500">Er zijn nog geen FAQ-items beschikbaar.</p>
            @endforelse
        </div>

        <!-- Paginatie -->
        @if(method_exists($faqs, 'links'))
            <div class="mt-8">
                {{ $faqs->links() }}
            </div>
        @endif

        <!-- Vraag insturen -->
        <div class="mt-12 bg-white shadow-sm rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                💬 Stel een vraag
            </h3>

            <form action="{{ route('faq.store') }}" method="POST">
                @csrf

                <label for="question" class="block text-sm font-medium text-gray-700 mb-1">
                    Je vraag
                </label>
                <textarea id="question" name="question" rows="4"
                          class="w-full border border-gray-300 rounded-lg p-3 focus:ring focus:ring-pink-300"
                          placeholder="Typ hier je vraag...">{{ old('question') }}</textarea>

                @error('question')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <button
                    type="submit"
                    class="mt-4 px-6 py-3 rounded-xl font-semibold text-white
                           bg-gradient-to-r from-pink-400 to-pink-600
                           hover:from-pink-500 hover:to-pink-700
                           shadow-md transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-pink-300">
                    Verstuur vraag
                </button>
            </form>
        </div>
    </div>
@endsection

