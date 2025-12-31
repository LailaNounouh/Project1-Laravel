<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuws
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">

        <!-- Pagina titel & intro -->
        <h1 class="text-4xl font-extrabold text-pink-500 mb-4">
            GlamConnect Looks
        </h1>

        <p class="text-gray-600 max-w-2xl mb-12">
            Ontdek make-up, glam & beauty inspiratie van creatives binnen GlamConnect.
        </p>

        <!-- ✅ Zoekbalk -->
        <form method="GET"
              action="{{ route('news.index') }}"
              class="mb-6 flex gap-2">
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Zoek in nieuws..."
                class="w-full border border-gray-300 rounded px-3 py-2"
            >

            <button
                type="submit"
                class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600">
                Zoeken
            </button>
        </form>

        @if ($news->isEmpty())
            <p class="text-gray-500">Geen nieuws gevonden.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($news as $index => $item)

                    <!-- Featured hero wrapper voor eerste item -->
                    <div class="{{ $index === 0 ? 'md:col-span-2 lg:col-span-2' : '' }}">

                        <!-- Lookbook-style news card -->
                        <div class="group bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden h-full">
                            <div class="relative overflow-hidden">
                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    class="w-full {{ $index === 0 ? 'h-96' : 'h-72' }} object-cover group-hover:scale-105 transition duration-300"
                                    alt="{{ $item->title }}"
                                >

                                <span class="absolute top-4 left-4 bg-pink-500 text-white text-xs px-3 py-1 rounded-full">
                                    {{ $index === 0 ? 'Featured Look' : 'Glam Look' }}
                                </span>
                            </div>

                            <div class="p-6">
                                <h3 class="text-2xl font-bold tracking-tight text-gray-900 mb-2">
                                    {{ $item->title }}
                                </h3>

                                <p class="text-sm text-gray-500 leading-relaxed mb-4">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->content), $index === 0 ? 160 : 100) }}
                                </p>

                                <a
                                    href="{{ route('news.show', $item) }}"
                                    class="inline-flex items-center text-pink-500 font-semibold hover:underline"
                                >
                                    Bekijk look →
                                </a>
                            </div>
                        </div>

                    </div>

                @endforeach
            </div>

            <div class="mt-10">
                {{ $news->links() }}
            </div>
        @endif

    </div>
</x-app-layout>
