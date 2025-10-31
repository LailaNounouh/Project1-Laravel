@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-pink-600 mb-6">Nieuws</h1>

        @if(Auth::check() && Auth::user()->is_admin)
            <div class="mb-4">
                <a href="{{ route('news.create') }}" class="btn-glam">➕ Nieuw bericht</a>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @forelse($news as $item)
            <article class="mb-8 border-b pb-6">
                <h2 class="text-2xl font-semibold mb-2">
                    <a href="{{ route('news.show', $item) }}" class="text-pink-600 hover:underline">
                        {{ $item->title }}
                    </a>
                </h2>

                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="w-full max-w-lg mb-3 rounded shadow">
                @endif

                <p class="text-gray-700 mb-2">{{ Str::limit(strip_tags($item->content), 150) }}</p>
                <a href="{{ route('news.show', $item) }}" class="text-gray-600 hover:underline">Lees meer</a>
            </article>
        @empty
            <p class="text-gray-500">Er zijn momenteel geen nieuwsitems.</p>
        @endforelse

        <div class="mt-6">
            {{ $news->links() }}
        </div>
    </div>
@endsection

