<header class="sticky top-0 z-30 h-16 bg-white border-b border-slate-200 shadow-sm shrink-0">
    <div class="px-4 sm:px-6 h-full flex items-center justify-between">
        
        <!-- Left: Mobile menu button & Title -->
        <div class="flex items-center gap-4">
            <!-- Hamburger button -->
            <button class="text-slate-500 hover:text-slate-700 focus:outline-none lg:hidden" @click="sidebarOpen = true">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h2 class="text-xl font-semibold text-slate-800 hidden sm:block">
                @yield('header_title', 'Dashboard')
            </h2>
        </div>

        <!-- Right: Search, Notifications, Profile -->
        <div class="flex items-center space-x-3 sm:space-x-5">
            
            <!-- Search -->
            <div class="hidden md:block relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" class="block w-64 h-9 pl-10 pr-3 text-sm text-slate-900 border border-slate-200 rounded-lg bg-slate-50 focus:bg-white focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-400" placeholder="Search Request...">
            </div>

            <!-- Notifications -->
            <button class="relative p-2 text-slate-400 hover:text-slate-600 transition-colors rounded-full hover:bg-slate-100 focus:outline-none">
                <span class="sr-only">Notifications</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <div class="absolute top-1.5 right-1.5 w-2 h-2 bg-rose-500 border-2 border-white rounded-full"></div>
            </button>

            <!-- User Profile Dropdown -->
            <div class="relative inline-flex" x-data="{ open: false }">

                <!-- Profile Button -->
                <button
                    type="button"
                    class="inline-flex items-center gap-2 group focus:outline-none"
                    aria-haspopup="true"
                    @click.prevent="open = !open"
                    :aria-expanded="open"
                >

                    <!-- Avatar -->
                    <img
                        class="w-9 h-9 rounded-full border border-slate-200 object-cover"
                        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff"
                        width="36"
                        height="36"
                        alt="{{ auth()->user()->name }}"
                    >

                    <!-- User Name -->
                    <div class="hidden sm:flex items-center">

                        <span class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors">
                            {{ auth()->user()->name }}
                        </span>

                        <svg
                            class="w-3 h-3 ml-1 text-slate-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>

                    </div>

                </button>


                <!-- Dropdown -->
                <div
                    class="origin-top-right absolute top-full right-0 w-64 bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden mt-2 z-50"
                    @click.outside="open = false"
                    @keydown.escape.window="open = false"
                    x-show="open"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    style="display: none;"
                >

                    <!-- User Information -->
                    <div class="px-4 py-4 border-b border-slate-100">

                        <div class="flex items-center gap-3">

                            <!-- Avatar -->
                            <img
                                class="w-10 h-10 rounded-full border border-slate-200 object-cover"
                                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff"
                                width="40"
                                height="40"
                                alt="{{ auth()->user()->name }}"
                            >

                            <div class="min-w-0">

                                <div class="font-semibold text-slate-800 text-sm truncate">
                                    {{ auth()->user()->name }}
                                </div>

                                <div class="text-xs text-slate-500 truncate">
                                    {{ auth()->user()->email }}
                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Menu -->
                    <div class="py-1">

                        <!-- Profile -->
                        <a
                            href="{{ route('profile') }}"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition-colors"
                        >

                            <svg
                                class="w-5 h-5 text-slate-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 19a6 6 0 10-12 0m6-6a4 4 0 100-8 4 4 0 000 8zm5-3h6m-3-3v6"
                                />
                            </svg>

                            <span>Profile</span>

                        </a>


                        <!-- Settings -->
                        <a
                            href="#"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition-colors"
                        >

                            <svg
                                class="w-5 h-5 text-slate-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10.325 4.317a1.724 1.724 0 013.35 0 1.724 1.724 0 002.573 1.066 1.724 1.724 0 012.365.85 1.724 1.724 0 001.56 1.815 1.724 1.724 0 010 3.35 1.724 1.724 0 00-1.066 2.573 1.724 1.724 0 01-.85 2.365 1.724 1.724 0 00-1.815 1.56 1.724 1.724 0 01-3.35 0 1.724 1.724 0 00-2.573-1.066 1.724 1.724 0 01-2.365-.85 1.724 1.724 0 00-1.56-1.815 1.724 1.724 0 010-3.35 1.724 1.724 0 001.066-2.573 1.724 1.724 0 01.85-2.365 1.724 1.724 0 001.815-1.56z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>

                            <span>Settings</span>

                        </a>

                    </div>


                    <!-- Logout -->
                    <div class="border-t border-slate-100 py-1">

                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:text-red-600 hover:bg-red-50 transition-colors text-left"
                            >

                                <svg
                                    class="w-5 h-5 text-slate-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    />
                                </svg>

                                <span>Sign Out</span>

                            </button>

                        </form>

                    </div>

                </div>

            </div>
</header>
