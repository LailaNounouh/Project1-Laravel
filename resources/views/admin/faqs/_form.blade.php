@csrf

<div class="space-y-4">

    <div>
        <label class="block font-semibold mb-1 text-gray-800 dark:text-gray-200">Vraag</label>

        <input
            type="text"
            name="question"
            class="w-full border border-gray-300 dark:border-gray-700
                   rounded-lg p-2 bg-white dark:bg-gray-800 dark:text-gray-100"
            value="{{ old('question', $faq->question ?? '') }}"
            required
        >

        @error('question')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label class="block font-semibold mb-1 text-gray-800 dark:text-gray-200">Antwoord</label>

        <textarea
            name="answer"
            rows="5"
            class="w-full border border-gray-300 dark:border-gray-700
                   rounded-lg p-2 bg-white dark:bg-gray-800 dark:text-gray-100"
            required>{{ old('answer', $faq->answer ?? '') }}</textarea>

        @error('answer')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label class="block font-semibold mb-1 text-gray-800 dark:text-gray-200">Categorie</label>

        <select
            name="category_id"
            class="w-full border border-gray-300 dark:border-gray-700
                   rounded-lg p-2 bg-white dark:bg-gray-800 dark:text-gray-100"
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
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>


    <div class="flex items-center gap-3 pt-2">
        <button
            class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
            Opslaan
        </button>

        <a href="{{ route('admin.faqs.index') }}"
           class="text-gray-700 dark:text-gray-300 hover:underline">
            Annuleren
        </a>
    </div>

</div>
