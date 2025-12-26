<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Nieuwsbericht
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 max-w-3xl px-4">

        {{-- Artikel --}}
        <article class="bg-white dark:bg-gray-800 dark:text-gray-100
                        border border-gray-200 dark:border-gray-700
                        p-6 rounded-xl shadow">

            <h1 class="text-3xl font-bold mb-4 text-pink-600 dark:text-pink-400">
                {{ $news->title }}
            </h1>

            @if ($news->image)
                <img src="{{ asset('storage/' . $news->image) }}"
                     class="w-full max-w-2xl mb-6 rounded-lg shadow"
                     alt="{{ $news->title }}">
            @endif

            <div class="prose dark:prose-invert max-w-none">
                {!! $news->content !!}
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400 mt-6">
                Geplaatst op {{ $news->created_at->format('d/m/Y H:i') }}
            </p>
        </article>

        {{-- Reacties --}}
        <section class="mt-12">

            <h3 class="text-xl font-semibold mb-4 dark:text-gray-100">
                Reacties
            </h3>

            {{-- Bestaande reacties --}}
            @if ($comments->isEmpty())
                <p class="text-gray-500 dark:text-gray-300">
                    Er zijn nog geen reacties.
                </p>
            @else
                <div class="space-y-4">
                    @foreach ($comments as $comment)
                        <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                            <p class="text-gray-800 dark:text-gray-100">
                                {{ $comment->content }}
                            </p>
                            <small class="text-gray-500 dark:text-gray-400">
                                Geplaatst op {{ $comment->created_at->format('d/m/Y H:i') }}
                            </small>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Validatiefouten --}}
            @if ($errors->any())
                <div class="mt-6 p-4 bg-red-100 text-red-700 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Reactie plaatsen --}}
            @auth
                <form method="POST"
                      action="{{ route('comments.store', $news->id) }}"
                      class="mt-6">

                    @csrf

                    <textarea name="content"
                              rows="4"
                              class="w-full border border-gray-300 dark:border-gray-600
                                     dark:bg-gray-700 dark:text-gray-100
                                     p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                              placeholder="Schrijf een reactie..."
                              required>{{ old('content') }}</textarea>

                    <button type="submit"
                            class="mt-3 bg-pink-500 text-white px-5 py-2 rounded-lg
                                   hover:bg-pink-600 transition">
                        Plaatsen
                    </button>
                </form>
            @else
                <p class="mt-6 text-gray-600 dark:text-gray-300">
                    <a href="{{ route('login') }}"
                       class="text-pink-600 dark:text-pink-400 underline">
                        Log in
                    </a> om een reactie te plaatsen.
                </p>
            @endauth

        </section>

    </div>
</x-app-layout>
