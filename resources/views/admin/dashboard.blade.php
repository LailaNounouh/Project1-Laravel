<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Admin dashboard — Welkom terug, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Admin statistieken --}}
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

            {{-- Snelle links --}}
            <div class="bg-white dark:bg-gray-800 dark:text-gray-100
                        p-6 shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold mb-4 text-pink-600 dark:text-pink-400">
                    Beheer snel
                </h3>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admin.faqs.index') }}"
                       class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                        FAQ beheer
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                       class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                        Categorieën
                    </a>

                    <a href="{{ route('admin.contacts.index') }}"
                       class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                        Contactberichten
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                        Users
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

