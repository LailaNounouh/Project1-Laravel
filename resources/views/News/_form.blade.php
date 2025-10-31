@php
    $isEdit = isset($news);
@endphp

<form method="POST"
      action="{{ $isEdit ? route('news.update', $news) : route('news.store') }}"
      enctype="multipart/form-data"
      class="space-y-5 bg-white p-6 rounded shadow">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div>
        <label class="block font-semibold mb-1">Titel</label>
        <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}"
               class="border rounded w-full p-2" required>
        @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-semibold mb-1">Afbeelding (optioneel)</label>
        <input type="file" name="image" accept="image/*" class="border rounded w-full p-2">
        @if($isEdit && $news->image)
            <img src="{{ asset('storage/'.$news->image) }}" alt="huidige afbeelding" class="w-40 mt-2 rounded">
        @endif
        @error('image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-semibold mb-1">Inhoud</label>
        <textarea name="content" rows="8" class="border rounded w-full p-2" required>{{ old('content', $news->content ?? '') }}</textarea>
        @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit" class="btn-glam">{{ $isEdit ? '💾 Bijwerken' : '💾 Opslaan' }}</button>
        <a href="{{ route('news.index') }}" class="underline text-gray-600 hover:text-pink-600">Annuleren</a>
    </div>
</form>
