@csrf
<div class="space-y-4">
    <div>
        <label class="block font-semibold mb-1">Naam van categorie</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="border rounded w-full p-2" required>
        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 flex gap-3">
    <button class="btn-glam">Opslaan</button>
    <a href="{{ route('admin.categories.index') }}" class="underline">Annuleren</a>
</div>

