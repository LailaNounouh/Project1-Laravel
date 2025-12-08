
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            GlamConnect News
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">


            <section class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6">
                <h1 class="text-2xl font-bold mb-2 text-pink-600 dark:text-pink-400">
                    Nieuws & Events
                </h1>

                <p class="text-gray-700 dark:text-gray-300 mb-4 text-sm">
                    Blijf op de hoogte van de laatste events, workshops en tips rond beauty, styling en IT.
                </p>

                <form method="GET"
                      action="{{ route('news.index') }}"
                      class="flex flex-col md:flex-row md:items-center gap-3">

                    <input
                        type="text"
                        name="q"
                        value="{{ old('q', $search ?? request('q')) }}"
                        placeholder="Zoek in nieuws (titel of inhoud)…"
                        class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm w-full md:max-w-md
                               focus:outline-none focus:ring focus:ring-pink-200 dark:bg-gray-700 dark:text-gray-100">

                    <div class="flex items-center gap-2">
                        <button type="submit" class="btn-glam text-xs md:text-sm">
                            Zoeken
                        </button>

                        @if(request('q'))
                            <a href="{{ route('news.index') }}"
                               class="text-xs md:text-sm text-gray-600 dark:text-gray-300 underline">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </section>


            @auth
                @if(Auth::user()->is_admin)
                    <div class="flex justify-end">
                        <a href="{{ route('admin.news.create') }}"
                           class="btn-glam text-xs md:text-sm">
                            + Nieuw bericht
                        </a>
                    </div>
                @endif
            @endauth


            @forelse($news as $item)
                <article class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6 border border-pink-50 dark:border-gray-700 mb-2">
                    <h2 class="text-xl font-semibold text-pink-600 dark:text-pink-400">
                        {{ $item->title }}
                    </h2>

                    @if($item->image)
                        <div class="mt-4">
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                class="rounded-lg shadow max-h-64 w-full object-cover">
                        </div>
                    @endif

                    <p class="text-gray-700 dark:text-gray-300 mt-4 text-sm leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($item->content, 200) }}
                    </p>

                    <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
                        <a href="{{ route('news.show', $item) }}"
                           class="text-sm underline text-pink-600 dark:text-pink-300 hover:text-pink-800 dark:hover:text-pink-200">
                            Lees meer
                        </a>

                        @auth
                            @if(Auth::user()->is_admin)
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                       class="px-3 py-1 rounded-lg text-xs font-medium bg-yellow-100 text-yellow-800 hover:bg-yellow-200">
                                        Bewerken
                                    </a>

                                    <form action="{{ route('admin.news.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Weet je zeker dat je dit nieuwsbericht wil verwijderen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 rounded-lg text-xs font-medium bg-red-100 text-red-800 hover:bg-red-200">
                                            Verwijderen
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </article>
            @empty
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Er zijn nog geen nieuwsberichten beschikbaar.
                </p>
            @endforelse

            <div>
                {{ $news->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
