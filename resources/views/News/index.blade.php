@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">

        <h1 class="text-3xl font-bold text-pink-600 mb-6">Nieuws</h1>

        {{-- Knop voor admin: Nieuw bericht --}}
        @auth
            @if(Auth::user()->is_admin)
                <div class="mb-4">
                    <a href="{{ route('news.create') }}" class="btn-glam">
                        + Nieuw bericht
                    </a>
                </div>
            @endif
        @endauth

        {{-- Lijst met nieuws --}}
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
