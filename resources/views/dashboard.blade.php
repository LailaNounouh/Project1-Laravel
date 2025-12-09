<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Persoonlijke info --}}
            <div class="bg-white p-6 shadow-sm rounded-xl border border-pink-50">
                <h3 class="text-lg font-semibold mb-4 text-pink-600">
                    Jouw account
                </h3>

                <dl class="space-y-2 text-gray-700">
                    <div>
                        <dt class="font-medium inline-block w-40">Naam</dt>
                        <dd class="inline-block">{{ Auth::user()->name }}</dd>
                    </div>

                    <div>
                        <dt class="font-medium inline-block w-40">E-mailadres</dt>
                        <dd class="inline-block">{{ Auth::user()->email }}</dd>
                    </div>

                    <div>
                        <dt class="font-medium inline-block w-40">Account aangemaakt</dt>
                        <dd class="inline-block">
                            {{ Auth::user()->created_at?->format('d-m-Y') }}
                        </dd>
                    </div>

                    <div>
                        <dt class="font-medium inline-block w-40">Laatste login</dt>
                        <dd class="inline-block">
                            {{ Auth::user()->last_login_at ? Auth::user()->last_login_at->diffForHumans() : 'Nog niet beschikbaar' }}
                        </dd>
                    </div>
                </dl>
            </div>

            {{-- Admin statistieken --}}
            @if(Auth::user()->is_admin)
                <div class="bg-white p-6 shadow-sm rounded-xl border border-yellow-100">
                    <h3 class="text-lg font-semibold mb-4 text-yellow-700">
                        Overzicht voor admins
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <div class="p-4 bg-yellow-50 rounded-lg text-center">
                            <p class="text-2xl font-bold text-gray-900">
                                {{ \App\Models\User::count() }}
                            </p>
                            <p class="text-xs text-gray-600 mt-1">Gebruikers</p>
                        </div>

                        <div class="p-4 bg-yellow-50 rounded-lg text-center">
                            <p class="text-2xl font-bold text-gray-900">
                                {{ \App\Models\News::count() }}
                            </p>
                            <p class="text-xs text-gray-600 mt-1">Nieuwsberichten</p>
                        </div>

                        <div class="p-4 bg-yellow-50 rounded-lg text-center">
                            <p class="text-2xl font-bold text-gray-900">
                                {{ \App\Models\Contact::count() }}
                            </p>
                            <p class="text-xs text-gray-600 mt-1">Contactberichten</p>
                        </div>

                        <div class="p-4 bg-yellow-50 rounded-lg text-center">
                            <p class="text-2xl font-bold text-gray-900">
                                {{ \App\Models\Comment::count() }}
                            </p>
                            <p class="text-xs text-gray-600 mt-1">Reacties op nieuws</p>
                        </div>

                    </div>
                </div>
            @endif

            {{-- Korte uitleg --}}
            <div class="bg-white p-6 shadow-sm rounded-xl border border-gray-100">
                <h3 class="text-lg font-semibold mb-4 text-pink-600">
                    Wat kan je hier doen?
                </h3>

                <ul class="list-disc pl-5 space-y-1 text-gray-700 text-sm">
                    <li>Nieuws lezen en details bekijken.</li>
                    <li>Je profiel bijwerken (bio, foto, gegevens).</li>
                    <li>Veelgestelde vragen bekijken en zelf een vraag doorsturen.</li>
                    <li>Via de contactpagina een bericht sturen naar het GlamConnect-team.</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
