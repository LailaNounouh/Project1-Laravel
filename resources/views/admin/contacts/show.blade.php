@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-4">

        <h1 class="text-2xl font-bold text-pink-600 mb-4">
            Contactbericht
        </h1>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-6 space-y-3">

            <p class="text-sm">
                <span class="font-semibold text-gray-800">Naam:</span>
                <span class="text-gray-800">{{ $contact->name }}</span>
            </p>

            <p class="text-sm">
                <span class="font-semibold text-gray-800">E-mail:</span>
                <span class="text-gray-800">{{ $contact->email }}</span>
            </p>

            @if($contact->subject ?? null)
                <p class="text-sm">
                    <span class="font-semibold text-gray-800">Onderwerp:</span>
                    <span class="text-gray-800">{{ $contact->subject }}</span>
                </p>
            @endif

            <p class="text-xs text-gray-500">
                Verstuurd op {{ $contact->created_at?->format('d/m/Y H:i') }}
            </p>

            <div class="mt-4">
                <p class="text-sm font-semibold text-gray-800 mb-1">
                    Bericht
                </p>
                <div class="border border-gray-200 rounded-lg bg-gray-50 p-3 text-sm whitespace-pre-line text-gray-800">
                    {{ $contact->message }}
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.contacts.index') }}"
                   class="text-sm text-pink-600 hover:underline">
                    Terug naar overzicht
                </a>
            </div>

        </div>

    </div>
@endsection
