@csrf

<div class="mb-4">
    <label class="block font-semibold mb-1">Vraag</label>
    <input
        type="text"
        name="question"
        class="border rounded w-full p-2"
        value="{{ old('question', $faq->question ?? '') }}"
        required
    >
</div>

<div class="mb-4">
    <label class="block font-semibold mb-1">Antwoord</label>
    <textarea
        name="answer"
        rows="5"
        class="border rounded w-full p-2"
        required>{{ old('answer', $faq->answer ?? '') }}</textarea>
</div>

<div class="mb-4">
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
</div>

<button class="btn-glam">Opslaan</button>
<a href="{{ route('admin.faqs.index') }}" class="ml-2 underline">Annuleren</a>
