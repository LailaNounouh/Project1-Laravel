
@extends('layouts.app')
@section('content')
    <div class="max-w-4xl mx-auto py-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">FAQ beheer</h1>
            <a href="{{ route('admin.faqs.create') }}" class="btn-glam">+ Nieuwe FAQ</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="w-full bg-white rounded shadow">
            <thead>
            <tr class="text-left border-b">
                <th class="p-3">Vraag</th>
                <th class="p-3">Categorie</th>
                <th class="p-3 w-40">Acties</th>
            </tr>
            </thead>
            <tbody>
            @forelse($faqs as $faq)
                <tr class="border-b">
                    <td class="p-3">{{ $faq->question }}</td>
                    <td class="p-3">{{ optional($faq->category)->name ?? '—' }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.faqs.edit',$faq) }}" class="underline">Bewerken</a>
                        <form action="{{ route('admin.faqs.destroy',$faq) }}" method="POST" class="inline" onsubmit="return confirm('Verwijderen?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 underline ml-2">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td class="p-3" colspan="3">Geen FAQ’s.</td></tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $faqs->links() }}</div>
    </div>
@endsection

