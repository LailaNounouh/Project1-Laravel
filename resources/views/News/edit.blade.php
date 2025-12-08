<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100">
            Nieuwsbericht bewerken
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">

                <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="font-semibold">Titel</label>
                        <input type="text" name="title"
                               value="{{ $news->title }}"
                               class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"
                               required>
                    </div>

                    <div>
                        <label class="font-semibold">Afbeelding</label>
                        <input type="file"
                               name="image"
                               class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">

                        @if($news->image)
                            <img src="{{ asset('storage/'.$news->image) }}"
                                 class="w-32 mt-3 rounded shadow">
                        @endif
                    </div>

                    <div>
                        <label class="font-semibold">Inhoud</label>
                        <textarea name="content"
                                  rows="8"
                                  class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"
                                  required>{{ $news->content }}</textarea>
                    </div>

                    <button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded">
                        Bijwerken
                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
