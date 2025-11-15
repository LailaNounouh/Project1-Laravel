@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Categorieën beheren</h1>
            <a href="{{ route('admin.categories.create') }}" class="btn-glam">+ Nieuwe categorie</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="w-full bg-white rounded shadow">
            <thead>
            <tr class="text-left border-b">
                <th class="p-3">Naam</th>
                <th class="p-3 w-40">Acties</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr class="border-b">
                    <td class="p-3">{{ $category->name }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="underline">Bewerken</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Weet je zeker dat je dit wil verwijderen?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 underline ml-2">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td class="p-3" colspan="2">Geen categorieën gevonden.</td></tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $categories->links() }}</div>
    </div>
@endsection

