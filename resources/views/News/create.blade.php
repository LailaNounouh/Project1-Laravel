<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100">
            Nieuw nieuwsbericht
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

                <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div>
                        <label class="font-semibold">Titel</label>
                        <input type="text"
                               name="title"
                               class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"
                               required>
                    </div>

                    <div>
                        <label class="font-semibold">Afbeelding (optioneel)</label>
                        <input type="file" name="image"
                               class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label class="font-semibold">Inhoud</label>
                        <textarea name="content"
                                  rows="8"
                                  class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"
                                  required></textarea>
                    </div>

                    <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded">
                        Opslaan
                    </button>
                </form>

            </div>

        </div>

    </div>

</x-app-layout>

