<?php
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Bewerk nieuwsitem</h1>

        <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('news._form')
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Opslaan</button>
        </form>
    </div>
@endsection

