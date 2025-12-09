<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwsbericht bewerken
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 max-w-2xl">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Nieuwsbericht bewerken</h1>

        @include('news._form', ['news' => $news])
    </div>
</x-app-layout>
