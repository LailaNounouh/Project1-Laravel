@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
            <h1 class="text-3xl font-bold mb-6 text-pink-600">Nieuws</h1>


            <form method="GET" action="{{ route('news.index') }}" class="mb-6 flex items-center gap-3">
                <input
                    type="text"
                    name="q"
                    value="{{ old('q', $search ?? '') }}"
                    placeholder="Zoek in nieuws..."
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-full max-w-md focus:ring focus:ring-pink-200"
                >
                <button class="btn-glam" type="submit">Zoeken</button>
                @if(request('q'))
                    <a href="{{ route('news.index') }}" class="ml-2 text-sm text-gray-600 underline">Reset</a>
                @endif
            </form>
        </div>

        @auth
            @if(Auth::user()->is_admin)
                <div class="mb-4">
                    <a href="{{ route('news.create') }}" class="btn-glam">
                        + Nieuw bericht
                    </a>
                </div>
            @endif
        @endauth

        @foreach($news as $item)
            <div class="mb-8 pb-6 border-b">
                <h2 class="text-2xl font-semibold text-pink-600">
                    {{ $item->title }}
                </h2>

                <p class="text-gray-700 mt-2">
                    {{ \Illuminate\Support\Str::limit($item->content, 160) }}
                </p>

                <a href="{{ route('news.show', $item) }}" class="underline text-blue-500 hover:text-blue-700 mt-2 inline-block">
                    Lees meer
                </a>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $news->links() }}
        </div>

    </div>
@endsection
