<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welkom, {{ Auth::user()->name }} 🌸
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

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
    </div>
</x-app-layout>
