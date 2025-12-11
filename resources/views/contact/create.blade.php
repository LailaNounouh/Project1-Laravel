<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Contact
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-pink-600 dark:text-pink-400 text-center">
            Contact
        </h1>

        <div class="text-center mb-8">
            <h2 class="text-4xl font-extrabold mb-2">
                <span class="text-pink-500">Glam</span>
                <span class="text-gray-800 dark:text-gray-200">Connect</span>
            </h2>

            <p class="text-gray-600 dark:text-gray-300">
                Heb je een vraag, idee of wil je samenwerken? Laat een bericht achter.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl bg-green-50 dark:bg-green-900/30
                        border border-green-200 dark:border-green-700
                        px-4 py-3 text-sm text-green-800 dark:text-green-200 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 dark:text-gray-100
                    border border-gray-200 dark:border-gray-700
                    rounded-xl shadow p-6 transition">

            <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                @csrf

                {{-- Naam --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                        Naam
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-600
                               dark:bg-gray-700 dark:text-gray-100
                               px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300 dark:focus:ring-pink-500"
                        required
                    >
                    @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                        E-mail
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-600
                               dark:bg-gray-700 dark:text-gray-100
                               px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300 dark:focus:ring-pink-500"
                        required
                    >
                    @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bericht --}}
                <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                        Bericht
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-600
                               dark:bg-gray-700 dark:text-gray-100
                               px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300 dark:focus:ring-pink-500"
                        required
                    >{{ old('message') }}</textarea>

                    @error('message')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Verstuur knop --}}
                <div class="pt-2">
                    <button type="submit"
                            class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">
                        Verstuur bericht
                    </button>
                </div>
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-gray-400 dark:text-gray-500">
            Je bericht wordt veilig opgeslagen. We beantwoorden je zo snel mogelijk.
        </p>
    </div>
</x-app-layout>
