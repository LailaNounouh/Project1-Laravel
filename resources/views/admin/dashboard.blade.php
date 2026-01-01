<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Admin dashboard — Welkom terug, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    {{-- Accountinformatie --}}
    <div class="mt-6 bg-white dark:bg-gray-800 dark:text-gray-100
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
            {{ Auth::user()->last_login_at
                ? Auth::user()->last_login_at->diffForHumans()
                : 'Nog niet beschikbaar' }}
        </p>
    </div>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Admin statistieken --}}
            <div class="bg-yellow-50 dark:bg-yellow-900/30 p-6 shadow-lg rounded-xl
                        border border-yellow-100 dark:border-yellow-700/50">
                <h3 class="text-lg font-semibold mb-4 text-yellow-800 dark:text-yellow-300">
                    Admin statistieken
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow border text-center">
                        <p class="font-bold text-2xl">
                            {{ \App\Models\User::count() }}
                        </p>
                        <span class="text-sm">Gebruikers</span>
                    </div>

                    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow border text-center">
                        <p class="font-bold text-2xl">
                            {{ \App\Models\News::count() }}
                        </p>
                        <span class="text-sm">Nieuwsberichten</span>
                    </div>

                    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow border text-center">
                        <p class="font-bold text-2xl">
                            {{ \App\Models\Contact::count() }}
                        </p>
                        <span class="text-sm">Contactberichten</span>
                    </div>

                    <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow border text-center">
                        <p class="font-bold text-2xl">
                            {{ \App\Models\Comment::count() }}
                        </p>
                        <span class="text-sm">Reacties</span>
                    </div>

                </div>
            </div>

            {{-- Snelle admin acties --}}
            <div class="bg-white dark:bg-gray-800 p-6 shadow-lg rounded-xl border">
                <h3 class="text-lg font-semibold mb-4 text-pink-600">
                    Beheer snel
                </h3>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admin.faqs.index') }}" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                        FAQ beheer
                    </a>

                    <a href="{{ route('admin.categories.index') }}" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                        Categorieën
                    </a>

                    <a href="{{ route('admin.contacts.index') }}" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                        Contactberichten
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                        Users
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
