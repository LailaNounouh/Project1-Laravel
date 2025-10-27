<?php
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Nieuw nieuwsitem</h1>

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @include('news._form')
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Maak aan</button>
        </form>
    </div>
@endsection

