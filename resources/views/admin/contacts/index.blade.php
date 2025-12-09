@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-6 text-pink-600">
            Contactberichten
        </h1>

        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($contacts->isEmpty())
            <p class="text-sm text-gray-500">
                Er zijn nog geen contactberichten.
            </p>
        @else
            <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-pink-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Naam</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">E-mail</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Onderwerp</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Datum</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-700">Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr class="border-b border-gray-100 hover:bg-pink-50/40">
                            <td class="px-4 py-3 text-gray-800">{{ $contact->name }}</td>
                            <td class="px-4 py-3 text-gray-800">{{ $contact->email }}</td>
                            <td class="px-4 py-3 text-gray-700">
                                {{ \Illuminate\Support\Str::limit($contact->subject ?? $contact->message, 60) }}
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $contact->created_at?->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-3 text-right space-x-3">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                   class="text-pink-600 hover:underline">
                                    Bekijken
                                </a>

                                <form
                                    action="{{ route('admin.contacts.destroy', $contact) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Wil je dit bericht verwijderen?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">
                                        Verwijderen
                                    </button>
                                </form>
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
