<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Welkom terug, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Persoonlijke info --}}
            <div class="bg-white dark:bg-gray-800 dark:text-gray-100
                        p-6 shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold mb-4 text-pink-600 dark:text-pink-400">
                    Jouw accountinformatie
                </h3>

                <p class="text-gray-700 dark:text-gray-300">
                    <strong>Naam:</strong> {{ Auth::user()->name }}
                </p>

                <p class="text-gray-700 dark:text-gray-300">
                    <strong>E-mailadres:</strong> {{ Auth::user()->email }}
                </p>

                <p class="text-gray-700 dark:text-gray-300">
                    <strong>Account aangemaakt op:</strong>
                    {{ Auth::user()->created_at->format('d-m-Y') }}
                </p>

                <p class="text-gray-700 dark:text-gray-300">
                    <strong>Laatste login:</strong>
                    {{ Auth::user()->last_login_at ? Auth::user()->last_login_at->diffForHumans() : 'Nog niet beschikbaar' }}
                </p>
            </div>

            {{-- Admin statistieken --}}
            @if(Auth::user()->is_admin)
                <div class="bg-yellow-50 dark:bg-yellow-900/30 p-6 shadow-lg rounded-xl
                            border border-yellow-100 dark:border-yellow-700/50">
                    <h3 class="text-lg font-semibold mb-4 text-yellow-800 dark:text-yellow-300">
                        Admin statistieken
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <div class="p-4 bg-white dark:bg-gray-800 dark:text-gray-100
                                    rounded-xl shadow border border-gray-200 dark:border-gray-700 text-center">
                            <p class="font-bold text-2xl text-gray-800 dark:text-gray-100">
                                {{ \App\Models\User::count() }}
                            </p>
                            <span class="text-gray-600 dark:text-gray-300 text-sm">Gebruikers</span>
                        </div>

                        <div class="p-4 bg-white dark:bg-gray-800 dark:text-gray-100
                                    rounded-xl shadow border border-gray-200 dark:border-gray-700 text-center">
                            <p class="font-bold text-2xl text-gray-800 dark:text-gray-100">
                                {{ \App\Models\News::count() }}
                            </p>
                            <span class="text-gray-600 dark:text-gray-300 text-sm">Nieuwsberichten</span>
                        </div>

                        <div class="p-4 bg-white dark:bg-gray-800 dark:text-gray-100
                                    rounded-xl shadow border border-gray-200 dark:border-gray-700 text-center">
                            <p class="font-bold text-2xl text-gray-800 dark:text-gray-100">
                                {{ \App\Models\Contact::count() }}
                            </p>
                            <span class="text-gray-600 dark:text-gray-300 text-sm">Contactberichten</span>
                        </div>

                        <div class="p-4 bg-white dark:bg-gray-800 dark:text-gray-100
                                    rounded-xl shadow border border-gray-200 dark:border-gray-700 text-center">
                            <p class="font-bold text-2xl text-gray-800 dark:text-gray-100">
                                {{ \App\Models\Comment::count() }}
                            </p>
                            <span class="text-gray-600 dark:text-gray-300 text-sm">Reacties</span>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Overzicht --}}
            <div class="bg-white dark:bg-gray-800 dark:text-gray-100
                        p-6 shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold mb-4 text-pink-600 dark:text-pink-400">
                    GlamConnect overzicht
                </h3>

                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    Vanuit dit dashboard beheer je nieuws, FAQ, contactberichten en je profiel.
                </p>

                <ul class="list-disc pl-5 text-gray-700 dark:text-gray-300 space-y-1">
                    <li>Bekijk en beheer nieuwsberichten</li>
                    <li>Pas je profiel aan</li>
                    <li>Lees de FAQ</li>
                    <li>Beheer contactberichten (als admin)</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
