@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-pink-600">
                Categorieën
            </h1>
            <a href="{{ route('admin.categories.create') }}" class="btn-glam text-sm">
                Nieuwe categorie
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-pink-50 border-b border-gray-100">
                <tr>
                    <th class="p-3 text-left font-semibold text-gray-700">Naam</th>
                    <th class="p-3 text-right font-semibold text-gray-700">Acties</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr class="border-b border-gray-100 hover:bg-pink-50/40">
                        <td class="p-3 text-gray-800">
                            {{ $category->name }}
                        </td>
                        <td class="p-3 text-right space-x-2">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                               class="text-blue-600 hover:underline">
                                Bewerken
                            </a>

                            <form
                                action="{{ route('admin.categories.destroy', $category) }}"
                                method="POST"
                                class="inline"
                                onsubmit="return confirm('Wil je deze categorie verwijderen?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Verwijderen
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-3 text-gray-500 text-sm" colspan="2">
                            Er zijn nog geen categorieën.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>

    </div>
@endsection

