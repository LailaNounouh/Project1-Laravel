@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">


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
                    <a href="{{ route('admin.news.create') }}" class="btn-glam hover:bg-pink-600 hover:text-white transition">+ Nieuw bericht</a>
                </div>
            @endif
        @endauth


        @foreach($news as $item)
            <div class="mb-8 pb-6 border-b">
                <h2 class="text-2xl font-semibold text-pink-600">{{ $item->title }}</h2>
                <p class="text-gray-700 mt-2">{{ \Illuminate\Support\Str::limit($item->content, 160) }}</p>
                <a href="{{ route('news.show', $item) }}" class="underline text-blue-500 hover:text-blue-700 mt-2 inline-block">Lees meer</a>

                @auth
                    @if(Auth::user()->is_admin)
                        <div class="mt-2 flex gap-2">

                            <a href="{{ route('admin.news.edit', $item->id) }}"
                               class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">
                                Bewerk
                            </a>


                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Weet je het zeker?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach


        <div class="mt-4">
            {{ $news->links() }}
        </div>
    </div>
@endsection

