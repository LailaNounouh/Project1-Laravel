@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-3xl font-bold text-pink-600 mb-6">Contactbericht</h1>

        <div class="bg-white rounded-xl shadow p-6 space-y-5 border border-gray-100">

            <div>
                <span class="font-semibold text-gray-700">Naam:</span>
                <span class="text-gray-800">{{ $contact->name }}</span>
            </div>

            <div>
                <span class="font-semibold text-gray-700">E-mail:</span>
                <span class="text-gray-800">{{ $contact->email }}</span>
            </div>

            @if($contact->subject)
                <div>
                    <span class="font-semibold text-gray-700">Onderwerp:</span>
                    <span class="text-gray-800">{{ $contact->subject }}</span>
                </div>
            @endif

            <p class="text-sm text-gray-500">
                Verstuurd op: {{ $contact->created_at?->format('d/m/Y H:i') }}
            </p>


            <div>
                <p class="font-semibold mb-1 text-gray-700">Bericht:</p>
                <div class="border rounded-lg p-4 bg-gray-50 text-gray-800 whitespace-pre-line shadow-inner">
                    {{ $contact->message }}
                </div>
            </div>

            <div class="pt-3">
                <a href="{{ route('admin.contacts.index') }}"
                   class="text-pink-600 hover:underline">
                    Terug naar alle berichten
                </a>
            </div>

        </div>

    </div>
@endsection
