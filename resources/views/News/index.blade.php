@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">


        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 p-3 mb-4 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 dark:bg-red-800 text-red-800 dark:text-red-100 p-3 mb-4 rounded shadow">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
            <h1 class="text-3xl font-bold mb-6 text-pink-600 dark:text-pink-400">Nieuws</h1>


            <form method="GET" action="{{ route('news.index') }}" class="mb-6 flex items-center gap-3">
                <input type="text" name="q" value="{{ old('q', $search ?? '') }}" placeholder="Zoek in nieuws..."
                       class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm w-full max-w-md focus:ring focus:ring-pink-200 dark:bg-gray-700 dark:text-gray-100">
                <button type="submit" class="px-4 py-2 bg-pink-200 text-pink-800 rounded hover:bg-pink-300 transition">Zoeken</button>
                @if(request('q'))
                    <a href="{{ route('news.index') }}" class="ml-2 text-sm text-gray-600 dark:text-gray-400 underline hover:text-pink-400 transition">Reset</a>
                @endif
            </form>
        </div>

        @auth
            @if(Auth::user()->is_admin)
                <div class="mb-4">
                    <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-green-200 text-green-800 rounded hover:bg-green-300 transition">+ Nieuw bericht</a>
                </div>
            @endif
        @endauth


        @foreach($news as $item)
            <div class="mb-8 pb-6 border-b dark:border-gray-700 bg-white dark:bg-gray-800 p-6 rounded shadow-md">
                <h2 class="text-2xl font-semibold text-pink-600 dark:text-pink-400">{{ $item->title }}</h2>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ \Illuminate\Support\Str::limit($item->content, 160) }}</p>
                <a href="{{ route('news.show', $item) }}" class="underline text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 mt-2 inline-block">Lees meer</a>

                @auth
                    @if(Auth::user()->is_admin)
                        <div class="mt-2 flex gap-2">

                            <a href="{{ route('admin.news.edit', $item->id) }}"
                               class="px-4 py-2 bg-yellow-200 text-yellow-800 rounded hover:bg-yellow-300 transition">
                                Bewerk
                            </a>


                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Weet je het zeker?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 bg-red-200 text-red-800 rounded hover:bg-red-300 transition">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach


        <div class="mt-4">{{ $news->links() }}</div>
    </div>
@endsection
