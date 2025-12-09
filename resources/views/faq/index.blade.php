<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Veelgestelde vragen
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <div class="bg-white p-6 rounded-xl shadow">
                <h1 class="text-3xl font-bold text-pink-600 mb-4">
                    Veelgestelde vragen
                </h1>

                @auth
                    @if(Auth::user()->is_admin)
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('admin.faqs.index') }}"
                               class="px-4 py-2 rounded-lg bg-pink-200 text-pink-800 hover:bg-pink-300 transition">
                                FAQ beheren
                            </a>
                            <a href="{{ route('admin.categories.index') }}"
                               class="px-4 py-2 rounded-lg bg-purple-200 text-purple-800 hover:bg-purple-300 transition">
                                Categorieën beheren
                            </a>
                        </div>
                    @endif
                @endauth
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">
                    Filter op categorie
                </h2>

                <form method="GET" action="{{ route('faq.index') }}" class="flex flex-wrap items-center gap-4">
                    <select name="category"
                            class="border border-gray-300 rounded-lg px-4 py-2 min-w-[200px]">
                        <option value="">Alle categorieën</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button class="bg-pink-200 text-pink-800 px-4 py-2 rounded hover:bg-pink-300 transition">
                        Filter
                    </button>

                    @if(request('category'))
                        <a href="{{ route('faq.index') }}"
                           class="text-gray-600 underline">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <div class="space-y-6">
                @forelse($faqs as $faq)
                    <div class="bg-white p-6 rounded-xl shadow border-l-4 border-pink-400">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                            {{ $faq->question }}
                        </h3>

                        <p class="text-gray-700 mb-2">
                            {{ $faq->answer }}
                        </p>

                        <p class="text-sm text-gray-500">
                            Categorie:
                            <span class="font-medium">{{ $faq->category->name ?? 'Algemeen' }}</span>
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500 text-center">
                        Er zijn nog geen FAQ-items beschikbaar.
                    </p>
                @endforelse

                @if(method_exists($faqs, 'links'))
                    <div class="pt-4">
                        {{ $faqs->links() }}
                    </div>
                @endif
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-xl font-semibold mb-4 text-pink-600">
                    Stel een vraag
                </h3>

                <form action="{{ route('faq.store') }}" method="POST">
                    @csrf

                    <textarea
                        name="question"
                        rows="4"
                        placeholder="Typ hier je vraag..."
                        class="w-full border border-gray-300 rounded-lg p-3">{{ old('question') }}</textarea>

                    @error('question')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                    <button
                        class="mt-4 bg-pink-500 hover:bg-pink-600 text-white px-5 py-3 rounded-lg transition">
                        Verstuur vraag
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

