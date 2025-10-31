@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8 max-w-3xl">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

        @if($news->image)
            <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="w-full mb-4 rounded shadow">
        @endif

        <p class="text-sm text-gray-500 mb-4">
            Geplaatst op {{ $news->created_at->format('d/m/Y') }}
        </p>

        <div class="prose max-w-none">
            {!! nl2br(e($news->content)) !!}
        </div>

        @auth
            @if(Auth::user()->is_admin)
                <div class="mt-6 flex items-center gap-3">
                    <a href="{{ route('news.edit', $news) }}" class="btn-glam">✏️ Bewerken</a>

                    <form method="POST" action="{{ route('news.destroy', $news) }}" onsubmit="return confirm('Zeker verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn-glam" style="background-color:#e11d48;">🗑️ Verwijderen</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
@endsection


