@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <a href="{{ route('admin.contacts.index') }}" class="text-sm text-pink-600 hover:underline">
            ← Terug naar alle berichten
        </a>

        <div class="mt-4 bg-white shadow rounded-xl p-6 space-y-4">
            <h1 class="text-2xl font-bold text-pink-600 mb-2">
                💌 Bericht van {{ $contact->name }}
            </h1>

            <p><span class="font-semibold">E-mail:</span> {{ $contact->email }}</p>

            @if($contact->subject ?? null)
                <p><span class="font-semibold">Onderwerp:</span> {{ $contact->subject }}</p>
            @endif

            <p class="text-sm text-gray-500">
                Verstuurd op: {{ $contact->created_at?->format('d/m/Y H:i') }}
            </p>

            <div class="mt-4">
                <p class="font-semibold mb-1">Bericht:</p>
                <div class="border rounded-lg p-3 bg-gray-50 whitespace-pre-line">
                    {{ $contact->message }}
                </div>
            </div>
        </div>
    </div>
@endsection

