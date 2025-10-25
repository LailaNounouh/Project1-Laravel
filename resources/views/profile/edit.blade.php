<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Profielinformatie bijwerken -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <!-- Username -->
                        <div>
                            <label for="username" class="block font-medium text-sm text-gray-700">Username</label>
                            <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Verjaardag -->
                        <div>
                            <label for="birthday" class="block font-medium text-sm text-gray-700">Verjaardag</label>
                            <input id="birthday" type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('birthday') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Over mij -->
                        <div>
                            <label for="about" class="block font-medium text-sm text-gray-700">Over mij</label>
                            <textarea id="about" name="about" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('about', $user->about) }}</textarea>
                            @error('about') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Profielfoto -->
                        <div>
                            <label for="profile_photo" class="block font-medium text-sm text-gray-700">Profielfoto</label>
                            <input id="profile_photo" type="file" name="profile_photo" class="mt-1 block w-full">
                            @if($user->profile_photo)
                                <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Profielfoto" class="mt-2 w-32 h-32 object-cover rounded-full">
                            @endif
                            @error('profile_photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Opslaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Wachtwoord bijwerken -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Account verwijderen -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

