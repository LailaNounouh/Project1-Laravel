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

        <p class="text-gray-700 mb-6">
            Blijf op de hoogte van de laatste events, workshops en tips rond beauty, styling en IT.
        </p>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-3 mb-4 rounded shadow">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
            <h2 class="text-2xl font-semibold text-pink-600">Nieuws</h2>

            <form method="GET" action="{{ route('news.index') }}" class="flex items-center gap-3 w-full md:w-auto">
                <input
                    type="text"
                    name="q"
                    value="{{ old('q', $search ?? '') }}"
                    placeholder="Zoek in nieuws..."
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-full md:w-72 focus:ring focus:ring-pink-200"
                >
                <button
                    type="submit"
                    class="px-4 py-2 bg-pink-200 text-pink-800 rounded hover:bg-pink-300 transition">
                    Zoeken
                </button>

                @if(request('q'))
                    <a href="{{ route('news.index') }}"
                       class="ml-2 text-sm text-gray-600 underline hover:text-pink-500">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        @auth
            @if(Auth::user()->is_admin)
                <div class="mb-4">
                    <a href="{{ route('admin.news.create') }}"
                       class="px-4 py-2 bg-green-200 text-green-800 rounded hover:bg-green-300 transition">
                        Nieuw bericht
                    </a>
                </div>
            @endif
        @endauth

        @foreach($news as $item)
            <article class="mb-8 pb-6 border-b bg-white p-6 rounded shadow">
                <h2 class="text-2xl font-semibold text-pink-600">{{ $item->title }}</h2>

                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}"
                         alt="{{ $item->title }}"
                         class="my-4 rounded shadow max-w-full h-auto">
                @endif

                <p class="text-gray-700 mt-2">
                    {{ \Illuminate\Support\Str::limit($item->content, 160) }}
                </p>

                <a href="{{ route('news.show', $item) }}"
                   class="underline text-blue-600 hover:text-blue-800 mt-2 inline-block">
                    Lees meer
                </a>

                @auth
                    @if(Auth::user()->is_admin)
                        <div class="mt-2 flex gap-2">
                            <a href="{{ route('admin.news.edit', $item->id) }}"
                               class="px-4 py-1 bg-yellow-100 text-yellow-800 rounded hover:bg-yellow-200">
                                Bewerk
                            </a>

                            <form action="{{ route('admin.news.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Weet je het zeker?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-1 bg-red-100 text-red-800 rounded hover:bg-red-200">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </article>
        @endforeach

        <div class="mt-4">
            {{ $news->links() }}
        </div>
    </div>
</x-app-layout>

