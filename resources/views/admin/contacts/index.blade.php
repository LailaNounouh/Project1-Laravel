<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Contactberichten
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10">

        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($contacts->isEmpty())
            <p class="text-gray-500">Er zijn nog geen contactberichten.</p>
        @else

            <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">

                <table class="w-full text-sm">
                    <thead class="bg-pink-50 border-b">
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
                        <tr class="border-b hover:bg-pink-50/30">

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

                                <form action="{{ route('admin.contacts.destroy', $contact) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')">
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

</x-app-layout>
