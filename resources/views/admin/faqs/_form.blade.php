@csrf

<div class="space-y-6">

    {{-- Vraag --}}
    <div>
        <label class="block font-medium text-gray-700 mb-1">Vraag</label>
        <input
            type="text"
            name="question"
            value="{{ old('question', $faq->question ?? '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-pink-200"
            required
        >
        @error('question')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Antwoord --}}
    <div>
        <label class="block font-medium text-gray-700 mb-1">Antwoord</label>
        <textarea
            name="answer"
            rows="5"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-pink-200"
            required>{{ old('answer', $faq->answer ?? '') }}</textarea>
        @error('answer')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Categorie --}}
    <div>
        <label class="block font-medium text-gray-700 mb-1">Categorie</label>
        <select
            name="category_id"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-pink-200"
        >
            <option value="">Geen categorie</option>

            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    @selected(old('category_id', $faq->category_id ?? null) == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Knoppen --}}
    <div class="flex items-center gap-3">
        <button class="px-5 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition">
            Opslaan
        </button>

        <a href="{{ route('admin.faqs.index') }}"
           class="text-gray-600 hover:underline">
            Annuleren
        </a>
    </div>

</div>
