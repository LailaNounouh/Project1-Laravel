@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10">

        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-pink-600">FAQ beheer</h1>
            <a href="{{ route('admin.fa​​qs.create') }}"
               class="px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition">
                + Nieuwe FAQ
            </a>
        </div>

        {{-- Success --}}
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel --}}
        <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">

            <table class="w-full text-sm">
                <thead class="bg-pink-50 border-b">
                <tr>
                    <th class="p-3 text-left font-semibold text-gray-700">Vraag</th>
                    <th class="p-3 text-left font-semibold text-gray-700">Categorie</th>
                    <th class="p-3 text-right font-semibold text-gray-700">Acties</th>
                </tr>
                </thead>

                <tbody>
                @forelse($faqs as $faq)
                    <tr class="border-b hover:bg-pink-50/40">

                        <td class="p-3 text-gray-800">
                            {{ $faq->question }}
                        </td>

                        <td class="p-3 text-gray-700">
                            {{ $faq->category->name ?? '—' }}
                        </td>

                        <td class="p-3 text-right space-x-3">

                            <a href="{{ route('admin.faqs.edit', $faq) }}"
                               class="text-pink-600 hover:underline">
                                Bewerken
                            </a>

                            <form action="{{ route('admin.faqs.destroy', $faq) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Weet je zeker dat je dit item wilt verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Verwijderen</button>
                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-3 text-gray-500">
                            Geen FAQ’s gevonden.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>

        {{ $faqs->links() }}

    </div>
@endsection
