<?php
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <article>
            <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

            @if($news->image)
                <img src="{{ asset('storage/'.$news->image) }}" alt="" class="w-full max-w-2xl mb-4">
            @endif

            <div class="prose">
                {!! $news->content !!}
            </div>

            <p class="text-sm text-gray-600 mt-4">Geplaatst op {{ $news->created_at->format('d/m/Y H:i') }}</p>
        </article>
    </div>
@endsection

