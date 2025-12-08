<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ $news->title }}
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <article class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

                <h1 class="text-3xl font-bold text-pink-600 dark:text-pink-400 mb-4">
                    {{ $news->title }}
                </h1>

                @if($news->image)
                    <img src="{{ asset('storage/'.$news->image) }}"
                         class="w-full rounded-lg shadow mb-6">
                @endif

                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($news->content)) !!}
                </div>

                <p class="text-sm text-gray-500 mt-4">
                    Gepubliceerd op {{ $news->created_at->format('d/m/Y H:i') }}
                </p>

            </article>


            {{-- Reacties --}}
            <section>

                <h3 class="text-xl font-bold text-pink-600 dark:text-pink-400 mb-4">
                    Reacties
                </h3>

                @forelse($news->comments as $comment)

                    <div class="bg-pink-50 dark:bg-gray-700 p-4 rounded-lg mb-3">
                        <strong class="text-pink-700 dark:text-pink-300">
                            {{ $comment->user->name }}
                        </strong>

                        <p class="text-gray-800 dark:text-gray-200 mt-1">
                            {{ $comment->content }}
                        </p>

                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ $comment->created_at->diffForHumans() }}
                        </p>
                    </div>

                @empty
                    <p class="text-gray-500">Nog geen reacties.</p>
                @endforelse


                @auth
                    <form method="POST" action="{{ route('comments.store', $news) }}" class="mt-6">
                        @csrf

                        <textarea name="body"
                                  class="w-full border rounded-lg p-3 dark:bg-gray-700 dark:text-white"
                                  placeholder="Plaats een reactie..."
                                  required></textarea>

                        <button class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded text-white mt-3">
                            Plaatsen
                        </button>
                    </form>
                @else
                    <p class="mt-4">
                        <a href="{{ route('login') }}" class="text-pink-600 underline">
                            Log in
                        </a> om te reageren.
                    </p>
                @endauth

            </section>

        </div>

    </div>

</x-app-layout>
