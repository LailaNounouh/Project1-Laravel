<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">


                    <x-nav-link
                        :href="Auth::check() && Auth::user()->is_admin ? route('admin.dashboard') : route('dashboard')"
                        :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard')"
                    >
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')">
                        {{ __('News') }}
                    </x-nav-link>

                    <x-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.*')">
                        {{ __('FAQ') }}
                    </x-nav-link>

                    <x-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.*')">
                        {{ __('Contact') }}
                    </x-nav-link>

                    @auth
                        @if(Auth::user()->is_admin)
                            <x-nav-link :href="route('admin.faqs.index')" :active="request()->is('admin/faqs*')">
                                {{ __('FAQ beheer') }}
                            </x-nav-link>

                            <x-nav-link :href="route('admin.categories.index')" :active="request()->is('admin/categories*')">
                                {{ __('Categorieën') }}
                            </x-nav-link>

                            <x-nav-link :href="route('admin.contacts.index')" :active="request()->is('admin/contacts*')">
                                {{ __('Contactberichten') }}
                            </x-nav-link>

                            <x-nav-link :href="route('admin.users.index')" :active="request()->is('admin/users*')">
                                {{ __('Users') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-4">

                <button onclick="toggleTheme()"
                        class="px-3 py-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                    🌙
                </button>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 dark:text-gray-300 bg-white dark:bg-gray-800 hover:text-gray-700">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.show')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="space-x-4">
                        <x-nav-link :href="route('login')">Login</x-nav-link>
                        <x-nav-link :href="route('register')">Register</x-nav-link>
                    </div>
                @endif
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')">
                News
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.*')">
                FAQ
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.*')">
                Contact
            </x-responsive-nav-link>

            @auth
                @if(Auth::user()->is_admin)
                    <x-responsive-nav-link :href="route('admin.faqs.index')">
                        FAQ beheer
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.categories.index')">
                        Categorieën
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.contacts.index')">
                        Contactberichten
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('admin.users.index')">
                        Users
                    </x-responsive-nav-link>
                @endif
            @endauth

            <div class="px-4 py-2">
                <button
                    onclick="toggleTheme()"
                    class="w-full px-3 py-2 rounded text-sm bg-gray-200 dark:bg-gray-700 dark:text-gray-100
                           hover:bg-gray-300 dark:hover:bg-gray-600 transition"
                >
                </button>
            </div>

        </div>
    </div>
</nav>

<script>
    function toggleTheme() {
        const html = document.documentElement;

        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }
</script>
