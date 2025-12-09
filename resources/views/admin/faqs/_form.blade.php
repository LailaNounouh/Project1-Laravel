@csrf

<div class="space-y-4">

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Vraag
        </label>
        <input
            type="text"
            name="question"
            value="{{ old('question', $faq->question ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
            required
        >
        @error('question')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Antwoord
        </label>
        <textarea
            name="answer"
            rows="5"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
            required
        >{{ old('answer', $faq->answer ?? '') }}</textarea>
        @error('answer')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Categorie
        </label>
        <select
            name="category_id"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
        >
            <option value="">Geen categorie</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    @selected(old('category_id', $faq->category_id ?? null) == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button class="btn-glam text-sm">
            Opslaan
        </button>

        <a href="{{ route('admin.faqs.index') }}"
           class="text-sm text-gray-600 hover:underline">
            Annuleren
        </a>
    </div>

</div>
