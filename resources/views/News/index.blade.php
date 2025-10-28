@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Nieuws</h1>

        @if(!Auth::check())
            <div class="mb-6">
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded mr-2 hover:bg-blue-600">Login</a>
                <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Register</a>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        @foreach($news as $item)
            <article class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('news.show', $item) }}" class="text-blue-600 hover:underline">{{ $item->title }}</a>
                </h2>

                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="" class="w-full max-w-md mt-2 mb-2">
                @endif

                <p class="text-sm text-gray-600">Geplaatst op {{ $item->created_at->format('d/m/Y') }}</p>

                <p class="mt-2">{{ Str::limit(strip_tags($item->content), 150) }}</p>
            </article>
        @endforeach

        <div class="mt-4">
            {{ $news->links() }}
        </div>
    </div>
@endsection

