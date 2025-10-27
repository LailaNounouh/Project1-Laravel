<?php
@csrf

<div class="mb-4">
    <label class="block text-sm font-medium">Titel</label>
    <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}" class="mt-1 block w-full">
    @error('title') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium">Inhoud</label>
    <textarea name="content" rows="8" class="mt-1 block w-full">{{ old('content', $news->content ?? '') }}</textarea>
    @error('content') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium">Afbeelding</label>
    <input type="file" name="image" class="mt-1 block w-full">
    @if(!empty($news->image))
        <img src="{{ asset('storage/'.$news->image) }}" alt="" class="mt-2 w-48 h-48 object-cover">
    @endif
    @error('image') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
</div>

