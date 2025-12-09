@csrf

<div class="space-y-4">

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
            Naam van de categorie
        </label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', isset($category) ? $category->name : '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200"
            placeholder="Bijvoorbeeld: Algemeen, Technisch, Account..."
            required
        >
        @error('name')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button
            type="submit"
            class="btn-glam text-sm"
        >
            Opslaan
        </button>

        <a href="{{ route('admin.categories.index') }}"
           class="text-sm text-gray-600 hover:underline">
            Annuleren
        </a>
    </div>

</div>
