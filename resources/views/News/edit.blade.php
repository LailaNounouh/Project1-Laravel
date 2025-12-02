@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8 max-w-2xl">
        <h1 class="text-3xl font-bold mb-6 text-pink-600 dark:text-pink-400">Nieuwsbericht bewerken</h1>

        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data" class="space-y-5 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1 dark:text-gray-200">Titel</label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1 dark:text-gray-200">Inhoud</label>
                <textarea name="content" rows="8" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>{{ old('content', $news->content) }}</textarea>
                @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1 dark:text-gray-200">Afbeelding</label>
                <input type="file" name="image" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                @if($news->image)
                    <img src="{{ asset('storage/'.$news->image) }}" alt="huidige afbeelding" class="w-40 mt-2 rounded">
                @endif
                @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-glam">💾 Bijwerken</button>

                <a href="{{ route('news.index') }}" class="underline text-gray-600 dark:text-gray-400 hover:text-pink-600">Annuleren</a>
            </div>
        </form>
    </div>
@endsection

