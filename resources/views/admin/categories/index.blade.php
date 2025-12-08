@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10">

        <!-- Titel + knop -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-pink-600">Categorieën beheren</h1>

            <a href="{{ route('admin.categories.create') }}"
               class="px-5 py-2.5 rounded-lg bg-pink-500 text-white hover:bg-pink-600 transition shadow-sm">
                Nieuwe categorie
            </a>
        </div>

        <!-- Flash -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel -->
        <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-100">

            <table class="w-full">
                <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-4 text-left text-sm font-semibold text-gray-700">Naam</th>
                    <th class="p-4 text-right text-sm font-semibold text-gray-700">Acties</th>
                </tr>
                </thead>

                <tbody>

                @forelse($categories as $category)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4 text-gray-800">
                            {{ $category->name }}
                        </td>

                        <td class="p-4 text-right space-x-3">

                            <a href="{{ route('admin.categories.edit', $category) }}"
                               class="text-blue-600 hover:underline">
                                Bewerken
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Weet je zeker dat je deze categorie wil verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">
                                    Verwijderen
                                </button>
                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-4 text-gray-500 text-center">
                            Geen categorieën gevonden.
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">
            {{ $categories->links() }}
        </div>

    </div>
@endsection

