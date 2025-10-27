<?php
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Nieuws</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        @foreach($news as $item)
            <article class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
                </h2>

                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="" class="w-full max-w-md mt-2 mb-2">
                @endif

                <p class="text-sm text-gray-600">Geplaatst op {{ $item->created_at->format('d/m/Y') }}</p>

                <p class="mt-2">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 200) }}</p>
                <a href="{{ route('news.show', $item) }}" class="text-blue-600">Lees meer</a>
            </article>
        @endforeach

        {{ $news->links() }}
    </div>
@endsection

