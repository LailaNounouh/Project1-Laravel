<x-app-layout>
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Nieuwe gebruiker aanmaken</h1>

        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Naam</label>
                <input name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Wachtwoord</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_admin" value="1">
                <span>Admin</span>
            </div>

            <button class="bg-pink-500 text-white px-4 py-2 rounded">
                Gebruiker aanmaken
            </button>
        </form>
    </div>
</x-app-layout>
