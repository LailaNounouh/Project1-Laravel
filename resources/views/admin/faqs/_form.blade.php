
@csrf
<div class="space-y-4">
    <div>
        <label class="block font-semibold mb-1">Vraag</label>
        <input type="text" name="question" value="{{ old('question', $faq->question ?? '') }}" class="border rounded w-full p-2" required>
        @error('question')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block font-semibold mb-1">Antwoord</label>
        <textarea name="answer" rows="5" class="border rounded w-full p-2" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
        @error('answer')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block font-semibold mb-1">Categorie</label>
        <select name="category_id" class="border rounded p-2 w-full">
            <option value="">—</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected(old('category_id', $faq->category_id ?? null) == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 flex gap-3">
    <button class="btn-glam">Opslaan</button>
    <a href="{{ route('admin.faqs.index') }}" class="underline">Annuleren</a>
</div>

