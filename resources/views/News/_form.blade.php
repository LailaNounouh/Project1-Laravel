@php $isEdit = isset($news); @endphp

<div class="space-y-5">

    <div>
        <label class="font-semibold">Titel</label>
        <input type="text"
               name="title"
               value="{{ old('title', $news->title ?? '') }}"
               class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"
               required>
    </div>

    <div>
        <label class="font-semibold">Afbeelding (optioneel)</label>
        <input type="file"
               name="image"
               class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">

        @if($isEdit && $news->image)
            <img src="{{ asset('storage/'.$news->image) }}"
                 class="w-32 mt-3 rounded shadow">
        @endif
    </div>

    <div>
        <label class="font-semibold">Inhoud</label>
        <textarea name="content"
                  rows="8"
                  class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"
                  required>{{ old('content', $news->content ?? '') }}</textarea>
    </div>

</div>
