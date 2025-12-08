@csrf

<div class="space-y-5">

    <!-- Naam -->
    <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">
            Naam van de categorie
        </label>

        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', isset($category) ? $category->name : '') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-pink-300 focus:border-pink-400"
            placeholder="Bijvoorbeeld: Algemeen, Account, Technisch..."
            required
        >

        @error('name')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Knoppen -->
    <div class="flex gap-3 pt-2">

        <button
            type="submit"
            class="px-5 py-2 rounded-lg text-white bg-pink-500 hover:bg-pink-600 transition shadow-sm">
            Opslaan
        </button>

        <a
            href="{{ route('admin.categories.index') }}"
            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition">
            Annuleren
        </a>

    </div>

</div>
