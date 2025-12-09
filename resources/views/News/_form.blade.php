@php
    /** @var \App\Models\News|null $news */
    $isEdit = isset($news);
@endphp

<form
    method="POST"
    action="{{ $isEdit ? route('admin.news.update', $news) : route('admin.news.store') }}"
    enctype="multipart/form-data"
    class="space-y-5 bg-white border border-gray-100 rounded-xl shadow-sm p-6"
>
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Titel
        </label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $news->title ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
            required
        >
        @error('title')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Afbeelding (optioneel)
        </label>
        <input
            type="file"
            name="image"
            accept="image/*"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"
        >
        @if($isEdit && $news->image)
            <img src="{{ asset('storage/'.$news->image) }}"
                 alt="Huidige afbeelding"
                 class="mt-3 w-40 h-24 object-cover rounded-lg border border-gray-200">
        @endif
        @error('image')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Inhoud
        </label>
        <textarea
            name="content"
            rows="8"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
            required
        >{{ old('content', $news->content ?? '') }}</textarea>
        @error('content')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-glam text-sm">
            {{ $isEdit ? 'Opslaan' : 'Aanmaken' }}
        </button>

        <a href="{{ route('news.index') }}"
           class="text-sm text-gray-600 hover:underline">
            Annuleren
        </a>
    </div>
</form>
