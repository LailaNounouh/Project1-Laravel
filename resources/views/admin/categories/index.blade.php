@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-pink-600">Categorieën beheren</h1>
            <a href="{{ route('admin.categories.create') }}" class="btn-glam">+ Nieuwe categorie</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full bg-white rounded shadow">
            <thead>
            <tr class="border-b">
                <th class="p-3 text-left">Naam</th>
                <th class="p-3 text-right">Acties</th>
            </tr>
            </thead>

            <tbody>
            @forelse($categories as $category)
                <tr class="border-b">
                    <td class="p-3">{{ $category->name }}</td>

                    <td class="p-3 text-right space-x-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 underline">
                            Bewerken
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category) }}"
                              method="POST" class="inline"
                              onsubmit="return confirm('Weet je zeker dat je deze categorie wil verwijderen?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 underline">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="p-3 text-gray-500">Geen categorieën gevonden.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
