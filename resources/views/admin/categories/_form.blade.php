@csrf

<div class="space-y-4">

    <div>
        <label for="name"
               class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
            Naam van de categorie
        </label>

        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', isset($category) ? $category->name : '') }}"
            class="w-full border border-gray-300 dark:border-gray-700
                   bg-white dark:bg-gray-800
                   text-gray-900 dark:text-gray-100
                   rounded-lg px-3 py-2
                   focus:ring focus:ring-pink-300"
            required
        >

        @error('name')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>


    <div class="flex items-center gap-3 pt-2">

        <button type="submit"
                class="px-5 py-2.5 rounded-xl font-semibold text-white
                       bg-pink-500 hover:bg-pink-600 transition">
            Opslaan
        </button>

        <a href="{{ route('admin.categories.index') }}"
           class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                  text-gray-600 dark:text-gray-300
                  hover:bg-gray-50 dark:hover:bg-gray-800 transition">
            Annuleren
        </a>

    </div>

</div>
