@csrf

<div class="space-y-4">
    <div>
        <label class="block font-semibold mb-1">Vraag</label>
        <input
            type="text"
            name="question"
            class="border rounded w-full p-2"
            value="{{ old('question', $faq->question ?? '') }}"
            required
        >
        @error('question')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-semibold mb-1">Antwoord</label>
        <textarea
            name="answer"
            rows="5"
            class="border rounded w-full p-2"
            required>{{ old('answer', $faq->answer ?? '') }}</textarea>
        @error('answer')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-semibold mb-1">Categorie</label>
        <select name="category_id" class="border rounded w-full p-2">
            <option value="">Geen categorie</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    @selected(old('category_id', $faq->category_id ?? null) == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-3">
        <button class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600">
            Opslaan
        </button>
        <a href="{{ route('admin.faqs.index') }}" class="text-gray-600 hover:underline">
            Annuleren
        </a>
    </div>
</div>
