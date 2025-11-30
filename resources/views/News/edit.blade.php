@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8 max-w-2xl">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Nieuwsbericht bewerken</h1>

        {{-- Flash message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-3 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        {{-- Formulier voor bewerken --}}
        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1">Titel</label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="border rounded w-full p-2" required>
                @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">Inhoud</label>
                <textarea name="content" class="border rounded w-full p-2" rows="6" required>{{ old('content', $news->content) }}</textarea>
                @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">Afbeelding</label>
                <input type="file" name="image" class="border rounded w-full p-2">
                @if($news->image)
                    <p class="mt-2 text-sm text-gray-600">Huidige afbeelding: {{ $news->image }}</p>
                @endif
                @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="btn-glam">Opslaan</button>
                <a href="{{ route('news.index') }}" class="text-gray-500 hover:underline">Annuleer</a>
            </div>
        </form>
    </div>
