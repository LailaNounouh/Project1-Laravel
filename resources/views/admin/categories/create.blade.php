<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe categorie
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Nieuwe categorie</h1>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @include('admin.categories._form')
            </form>
        </div>
    </div>
</x-app-layout>
