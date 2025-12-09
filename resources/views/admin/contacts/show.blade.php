<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contactbericht
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-pink-600 mb-4">Contactbericht</h1>

        <div class="bg-white shadow rounded-xl p-6 space-y-4">
            <p><span class="font-semibold">Naam:</span> {{ $contact->name }}</p>
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

            <div class="mt-4">
                <a href="{{ route('admin.contacts.index') }}" class="text-pink-600 hover:underline">
                    Terug naar lijst
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
