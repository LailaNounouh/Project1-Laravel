<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            FAQ beheer
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8 px-4">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-pink-600">FAQ beheer</h1>

            <a href="{{ route('admin.faqs.create') }}"
               class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                Nieuwe FAQ
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-900
                        text-green-800 dark:text-green-200
                        p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full bg-white dark:bg-gray-800 dark:text-gray-100
                       border border-gray-200 dark:border-gray-700
                       rounded shadow">

            <thead>
            <tr class="border-b dark:border-gray-700">
                <th class="p-3 text-left">Vraag</th>
                <th class="p-3 text-left">Categorie</th>
                <th class="p-3 text-right">Acties</th>
            </tr>
            </thead>

            <tbody>
            @forelse($faqs as $faq)
                <tr class="border-b dark:border-gray-700 hover:bg-pink-50 dark:hover:bg-gray-700/50">

                    <td class="p-3">{{ $faq->question }}</td>

                    <td class="p-3">{{ optional($faq->category)->name ?? '—' }}</td>

                    <td class="p-3 text-right space-x-3">

                        <a href="{{ route('admin.faqs.edit', $faq) }}"
                           class="text-blue-600 dark:text-blue-400 hover:underline">
                            Bewerk
                        </a>

                        <form action="{{ route('admin.faqs.destroy', $faq) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Zeker weten?')">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 dark:text-red-400 hover:underline">
                                Verwijder
                            </button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-3 text-gray-500 dark:text-gray-400">Geen FAQ’s.</td>
                </tr>
            @endforelse
            </tbody>

        </table>

        <div class="mt-4">
            {{ $faqs->links() }}
        </div>

    </div>
</x-app-layout>
