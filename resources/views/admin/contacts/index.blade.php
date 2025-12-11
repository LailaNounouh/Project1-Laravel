<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Contactberichten
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto py-8 px-4">

        <h1 class="text-3xl font-bold mb-6 text-pink-600">Contactberichten</h1>

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900
                        text-green-800 dark:text-green-200
                        p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($contacts->isEmpty())
            <p class="text-gray-500 dark:text-gray-400">Er zijn nog geen contactberichten.</p>

        @else
            <div class="bg-white dark:bg-gray-800 dark:text-gray-100
                        border border-gray-200 dark:border-gray-700
                        shadow rounded-xl overflow-hidden">

                <table class="w-full text-sm">
                    <thead class="bg-pink-50 dark:bg-gray-700 border-b dark:border-gray-600">
                    <tr>
                        <th class="text-left px-4 py-3">Naam</th>
                        <th class="text-left px-4 py-3">E-mail</th>
                        <th class="text-left px-4 py-3">Onderwerp</th>
                        <th class="text-left px-4 py-3">Datum</th>
                        <th class="text-right px-4 py-3">Acties</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($contacts as $contact)
                        <tr class="border-b dark:border-gray-700 hover:bg-pink-50 dark:hover:bg-gray-700/40">

                            <td class="px-4 py-3">{{ $contact->name }}</td>
                            <td class="px-4 py-3">{{ $contact->email }}</td>

                            <td class="px-4 py-3">
                                {{ \Illuminate\Support\Str::limit($contact->subject ?? $contact->message, 60) }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $contact->created_at?->format('d/m/Y H:i') }}
                            </td>

                            <td class="px-4 py-3 text-right space-x-3">

                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                   class="text-pink-600 dark:text-pink-400 hover:underline">
                                    Bekijken
                                </a>

                                <form action="{{ route('admin.contacts.destroy', $contact) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-600 dark:text-red-400 hover:underline">
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
</x-app-layout>
