<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welkom terug, {{ Auth::user()->name }} 🌸
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Persoonlijke info --}}
            <div class="bg-white p-6 shadow-lg rounded-xl">
                <h3 class="text-lg font-semibold mb-4 text-pink-600">Jouw accountinformatie</h3>

                <p class="text-gray-700">
                    <strong>Naam:</strong> {{ Auth::user()->name }}
                </p>

                <p class="text-gray-700">
                    <strong>E-mailadres:</strong> {{ Auth::user()->email }}
                </p>

                <p class="text-gray-700">
                    <strong>Account aangemaakt op:</strong>
                    {{ Auth::user()->created_at->format('d-m-Y') }}
                </p>

                <p class="text-gray-700">
                    <strong>Laatste login:</strong>
                    {{ Auth::user()->last_login_at ? Auth::user()->last_login_at->diffForHumans() : 'Nog niet beschikbaar' }}
                </p>
            </div>

            {{-- Dashboard overzicht --}}
            <div class="bg-white p-6 shadow-lg rounded-xl">
                <h3 class="text-lg font-semibold mb-4 text-pink-600">GlamConnect overzicht</h3>

                <p class="text-gray-700 mb-4">
                    Dit is je GlamConnect-dashboard. Hier krijg je een overzicht van wat er gebeurt:
                </p>

                <ul class="list-disc pl-5 text-gray-700 space-y-1">
                    <li>Bekijk de nieuwste nieuwsberichten</li>
                    <li>Pas je profiel aan met jouw bio en profielfoto</li>
                    <li>Lees FAQ’s en stel zelf vragen</li>
                    <li>Neem contact op met het team via het contactformulier</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
