@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Nieuws</h1>

            @auth
                @if(Auth::user()->is_admin)
                    <a href="{{ route('news.create') }}" class="btn-glam">➕ Nieuw bericht</a>
                @endif
            @endauth
        </div>

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

                <p class="text-sm text-gray-500 mb-2">
                    Geplaatst op {{ $item->created_at->format('d/m/Y') }}
                </p>

                <p class="text-gray-700 mb-2">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 160, '...') }}
                </p>

                <a href="{{ route('news.show', $item) }}" class="underline text-gray-700">Lees meer</a>
            </article>
        @empty
            <p class="text-gray-500">Er zijn momenteel geen nieuwsitems.</p>
        @endforelse

        <div class="mt-6">
            {{ $news->links() }}
        </div>
    </div>
@endsection
