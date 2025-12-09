@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-4">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold text-pink-600 mb-2">
                    Nieuws
                </h1>
                <p class="text-sm text-gray-600">
                    Updates rond events, workshops en tips binnen GlamConnect.
                </p>
            </div>

            <form method="GET" action="{{ route('news.index') }}" class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <input
                    type="text"
                    name="q"
                    value="{{ old('q', $search ?? '') }}"
                    placeholder="Zoek op titel of inhoud..."
                    class="w-full sm:w-64 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
                >
                <div class="flex items-center gap-2">
                    <button type="submit" class="btn-glam text-sm">
                        Zoeken
                    </button>

                    @if(request('q'))
                        <a href="{{ route('news.index') }}"
                           class="text-xs text-gray-600 underline">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">
                {{ session('error') }}
            </div>
        @endif

        @auth
            @if(Auth::user()->is_admin)
                <div class="mb-5">
                    <a href="{{ route('admin.news.create') }}" class="btn-glam text-sm">
                        Nieuw nieuwsbericht
                    </a>
                </div>
            @endif
        @endauth

        @forelse($news as $item)
            <article class="mb-6 bg-white border border-gray-100 rounded-xl shadow-sm p-5">
                <h2 class="text-xl font-semibold text-gray-900">
                    {{ $item->title }}
                </h2>

                @if($item->image)
                    <div class="mt-3">
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->title }}"
                            class="w-full max-h-72 object-cover rounded-lg"
                        >
                    </div>
                @endif

                <p class="mt-3 text-gray-700 text-sm">
                    {{ \Illuminate\Support\Str::limit($item->content, 200) }}
                </p>

                <div class="mt-3 flex items-center justify-between text-xs text-gray-500">
                    <span>
                        Gepubliceerd op {{ $item->created_at?->format('d/m/Y') }}
                    </span>

                    <a href="{{ route('news.show', $item) }}"
                       class="text-pink-600 hover:underline">
                        Lees volledig artikel
                    </a>
                </div>

                @auth
                    @if(Auth::user()->is_admin)
                        <div class="mt-3 flex gap-3 text-sm">
                            <a href="{{ route('admin.news.edit', $item->id) }}"
                               class="text-blue-600 hover:underline">
                                Bewerken
                            </a>

                            <form action="{{ route('admin.news.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Wil je dit nieuwsbericht verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </article>
        @empty
            <p class="text-gray-500">
                Er zijn nog geen nieuwsberichten beschikbaar.
            </p>
        @endforelse

        <div class="mt-6">
            {{ $news->links() }}
        </div>
    </div>
@endsection
