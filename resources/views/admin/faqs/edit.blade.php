<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ bewerken
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">FAQ bewerken</h1>

        <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
            @method('PUT')
            @include('admin.faqs._form')
        </form>
    </div>
</x-app-layout>
