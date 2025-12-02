@php $isEdit = isset($news); @endphp

<form method="POST" action="{{ $isEdit ? route('admin.news.update', $news) : route('admin.news.store') }}" enctype="multipart/form-data" class="space-y-5 bg-white dark:bg-gray-800 p-6 rounded shadow">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div>
        <label class="block font-semibold mb-1 dark:text-gray-200">Titel</label>
        <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-semibold mb-1 dark:text-gray-200">Afbeelding (optioneel)</label>
        <input type="file" name="image" accept="image/*" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
        @if($isEdit && $news->image)
            <img src="{{ asset('storage/'.$news->image) }}" alt="Huidige afbeelding" class="w-40 mt-2 rounded">
        @endif
        @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-semibold mb-1 dark:text-gray-200">Inhoud</label>
        <textarea name="content" rows="8" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>{{ old('content', $news->content ?? '') }}</textarea>
        @error('content') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit" class="btn-glam">{{ $isEdit ? '💾 Bijwerken' : '💾 Opslaan' }}</button>
        <a href="{{ route('news.index') }}" class="underline text-gray-600 dark:text-gray-400 hover:text-pink-600">Annuleren</a>
    </div>
</form>
