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
                <button class="inline-flex justify-center items-center group focus:outline-none" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                    <img class="w-9 h-9 rounded-full border border-slate-200 object-cover" src="https://ui-avatars.com/api/?name=Admin+User&background=4f46e5&color=fff" width="36" height="36" alt="Admin User" />
                    <div class="hidden sm:flex items-center ml-2">
                        <span class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors">Admin</span>
                        <svg class="w-3 h-3 ml-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div class="origin-top-right absolute top-full right-0 min-w-[12rem] bg-white border border-slate-200 py-1.5 rounded-lg shadow-lg overflow-hidden mt-2 z-50" 
                     @click.outside="open = false" 
                     @keydown.escape.window="open = false" 
                     x-show="open" 
                     x-transition:enter="transition ease-out duration-100 transform" 
                     x-transition:enter-start="opacity-0 -translate-y-2" 
                     x-transition:enter-end="opacity-100 translate-y-0" 
                     x-transition:leave="transition ease-in duration-75" 
                     x-transition:leave-start="opacity-100" 
                     x-transition:leave-end="opacity-0" 
                     style="display: none;">
                    <div class="pt-1 pb-2 px-4 mb-1 border-b border-slate-100">
                        <div class="font-medium text-slate-800 text-sm">Admin User</div>
                        <div class="text-xs text-slate-500">admin@crms.test</div>
                    </div>
                    <ul class="text-sm">
                        <li>
                            <a class="block py-2 px-4 text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition-colors cursor-not-allowed" href="#" onclick="return false;">Profile</a>
                        </li>
                        <li>
                            <a class="block py-2 px-4 text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition-colors cursor-not-allowed" href="#" onclick="return false;">Settings</a>
                        </li>
                        <li>
                            <a class="block py-2 px-4 text-rose-600 hover:bg-rose-50 transition-colors cursor-not-allowed mt-1 border-t border-slate-100" href="#" onclick="return false;">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</header>
