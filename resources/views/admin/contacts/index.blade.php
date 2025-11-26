@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-8">

        <!-- ⭐ Consistente Pagina Titel -->
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Contactberichten</h1>

        @if($contacts->isEmpty())
            <p class="text-gray-500">Er zijn nog geen berichten.</p>
        @else
            <div class="bg-white shadow rounded-xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-pink-50 border-b">
                    <tr>
                        <th class="text-left px-4 py-3">Naam</th>
                        <th class="text-left px-4 py-3">E-mail</th>
                        <th class="text-left px-4 py-3">Datum</th>
                        <th class="text-right px-4 py-3">Acties</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($contacts as $contact)
                        <tr class="border-b hover:bg-pink-50/40">
                            <td class="px-4 py-3">{{ $contact->name }}</td>
                            <td class="px-4 py-3">{{ $contact->email }}</td>
                            <td class="px-4 py-3">
                                {{ $contact->created_at?->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                   class="text-pink-600 hover:underline">
                                    Bekijken →
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $contacts->links() }}
            </div>
        @endif

    </div>
@endsection
