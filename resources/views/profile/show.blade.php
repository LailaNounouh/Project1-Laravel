<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Mijn profiel
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-pink-600">Mijn profiel</h1>

        <div class="
            bg-white dark:bg-gray-800 dark:text-gray-100
            border border-gray-200 dark:border-gray-700
            rounded-xl shadow p-6 transition
        ">
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://via.placeholder.com/120' }}"
                     class="w-28 h-28 rounded-full object-cover shadow" />

                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $user->name }}
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $user->email }}
                    </p>

                    @if($user->birthday)
                        <p class="text-gray-700 dark:text-gray-300 mt-2">
                            <strong>Verjaardag:</strong>
                            {{ $user->birthday->format('d/m/Y') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">
                    Bio
                </h3>

                <p class="text-gray-700 dark:text-gray-300">
                    {{ $user->bio ?? 'Geen bio toegevoegd.' }}
                </p>
            </div>

            <a href="{{ route('profile.edit') }}"
               class="mt-6 inline-block bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                Profiel bewerken
            </a>
        </div>
    </div>
</x-app-layout>
