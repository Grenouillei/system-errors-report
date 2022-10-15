<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="65" viewBox="0 0 60 65" fill="none" class="h-10">
                            <path d="M19.544 65C14.1253 65 9.83733 63.8907 6.68 61.672C3.52267 59.4107 1.496 56.04 0.6 51.56C0.301334 49.768 0.642667 48.36 1.624 47.336C2.648 46.312 4.056 45.8 5.848 45.8C7.59733 45.8 8.856 46.248 9.624 47.144C10.4347 47.9973 11.096 49.2987 11.608 51.048C12.12 52.328 12.9733 53.1813 14.168 53.608C15.4053 54.0347 17.1973 54.248 19.544 54.248H40.536C43.864 54.248 46.104 53.7147 47.256 52.648C48.408 51.5387 48.984 49.256 48.984 45.8C48.984 42.3867 48.408 40.1253 47.256 39.016C46.104 37.9067 43.864 37.352 40.536 37.352H19.928C13.784 37.352 9.15467 35.7947 6.04 32.68C2.92533 29.5653 1.368 24.936 1.368 18.792C1.368 12.52 2.88267 7.848 5.912 4.776C8.984 1.66133 13.656 0.103996 19.928 0.103996H39.896C49.9227 0.103996 55.8533 4.328 57.688 12.776C58.0293 14.568 57.688 15.9547 56.664 16.936C55.64 17.9173 54.232 18.408 52.44 18.408C50.776 18.408 49.5387 17.9813 48.728 17.128C47.9173 16.232 47.2773 14.9947 46.808 13.416C46.296 12.392 45.5067 11.7093 44.44 11.368C43.416 11.0267 41.9013 10.856 39.896 10.856H19.928C16.6853 10.856 14.5733 11.3467 13.592 12.328C12.6107 13.3093 12.12 15.464 12.12 18.792C12.12 21.864 12.632 23.9333 13.656 25C14.7227 26.0667 16.8133 26.6 19.928 26.6H40.536C46.936 26.6 51.736 28.2 54.936 31.4C58.136 34.6 59.736 39.4 59.736 45.8C59.736 52.2427 58.136 57.064 54.936 60.264C51.736 63.4213 46.936 65 40.536 65H19.544Z" fill="#EF5F5F"/>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('admin-index')" :active="request()->routeIs('admin-index')">
                        {{ __('Administrator123') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                        {{ __('Projects') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
