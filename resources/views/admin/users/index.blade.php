<x-app-layout>
    <div class="max-w-6xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">
            User Management
        </h1>


        <a href="{{ route('admin.users.create') }}"
           class="inline-block mb-4 px-4 py-2 bg-pink-500 text-white rounded-lg">
            + Nieuwe gebruiker
        </a>

        @if(session('success'))
            <div class="mb-4 text-green-600 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 text-red-600 dark:text-red-400">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse rounded-lg shadow
                         bg-white dark:bg-gray-800
                         text-gray-700 dark:text-gray-200">

                <thead>
                <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="p-4">{{ $user->name }}</td>
                        <td class="p-4">{{ $user->email }}</td>
                        <td class="p-4">
                            @if($user->is_admin)
                                <span class="text-green-600 dark:text-green-400 font-semibold">
                                    Admin
                                </span>
                            @else
                                <span class="text-gray-600 dark:text-gray-400">
                                    User
                                </span>
                            @endif
                        </td>
                        <td class="p-4">
                            <form method="POST" action="{{ route('admin.users.toggleAdmin', $user) }}">
                                @csrf
                                @method('PATCH')

                                <button
                                    class="px-4 py-2 rounded text-white transition
                                        {{ $user->is_admin
                                            ? 'bg-red-500 hover:bg-red-600'
                                            : 'bg-pink-500 hover:bg-pink-600' }}">
                                    {{ $user->is_admin ? 'Remove admin' : 'Make admin' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

    </div>
</x-app-layout>
