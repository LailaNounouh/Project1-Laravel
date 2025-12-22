<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuws
        </h2>
    </x-slot>

    <div class="container mx-auto py-8">

        <h1 class="text-3xl font-bold mb-3 text-pink-600">
            GlamConnect News
        </h1>

        @if ($news->isEmpty())
            <p class="text-gray-500">Geen nieuws gevonden.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($news as $item)
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            class="w-full h-64 object-cover"
                            alt="{{ $item->title }}"
                        >

                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">
                                {{ $item->title }}
                            </h3>

                            <p class="text-sm text-gray-600 mb-4">
                                {{ \Illuminate\Support\Str::limit($item->content, 120) }}
                            </p>

                            <a
                                href="{{ route('news.show', $item) }}"
                                class="text-pink-500 font-semibold"
                            >
                                Lees meer
                            </a>
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
