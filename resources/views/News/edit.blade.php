@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8 max-w-2xl">
        <h1 class="text-3xl font-bold mb-6">Nieuwsbericht bewerken</h1>

        <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1">Titel</label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="border rounded w-full p-2" required>
                @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">Huidige afbeelding</label>
                @if($news->image)
                    <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="w-full max-w-sm mb-2 rounded">
                @else
                    <p class="text-gray-500">Geen afbeelding</p>
                @endif
                <input type="file" name="image" accept="image/*" class="border rounded w-full p-2">
                @error('image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">Inhoud</label>
                <textarea name="content" rows="8" class="border rounded w-full p-2" required>{{ old('content', $news->content) }}</textarea>
                @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button class="btn-glam">Bijwerken</button>
                <a href="{{ route('news.show', $news) }}" class="underline">Annuleren</a>
            </div>
        </form>
    </div>
@endsection


