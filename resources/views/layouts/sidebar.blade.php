<!-- Mobile Sidebar Backdrop -->
<div class="fixed inset-0 bg-slate-900/50 z-40 lg:hidden transition-opacity duration-200"
     x-show="sidebarOpen"
     x-transition:enter="transition-opacity ease-linear duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false"
     aria-hidden="true"
     style="display: none;"></div>

<!-- Sidebar -->
<div id="sidebar"
     class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 transform lg:translate-x-0 transition-transform duration-200 ease-in-out flex flex-col"
     :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
     @click.outside="if (window.innerWidth < 1024) sidebarOpen = false"
     @keydown.escape.window="sidebarOpen = false">

    <!-- Sidebar header / Logo -->
    <div class="flex items-center justify-between h-16 px-6 border-b border-slate-100 shrink-0">
        <a class="flex items-center gap-3 focus:outline-none" href="{{ route('dashboard') }}">
            <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-md shadow-indigo-200">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <div>
                <h1 class="text-lg font-bold text-slate-800 tracking-tight leading-none">CRMS</h1>
                <p class="text-[10px] text-slate-500 font-medium uppercase tracking-wider mt-0.5">Client Request Mgt</p>
            </div>
        </a>
        <!-- Close button for mobile -->
        <button class="lg:hidden text-slate-400 hover:text-slate-600 focus:outline-none" @click="sidebarOpen = false">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Links -->
    <div class="flex-1 overflow-y-auto p-4 space-y-6">
        
        <!-- MAIN -->
        <div>
            <h3 class="text-xs uppercase text-slate-400 font-semibold mb-2 px-3">Main</h3>
            <ul class="space-y-1">
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md font-medium text-sm transition-colors {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}"
                       href="{{ route('dashboard') }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- REQUEST MANAGEMENT -->
        <div>
            <h3 class="text-xs uppercase text-slate-400 font-semibold mb-2 px-3">Request Management</h3>
            <ul class="space-y-1">
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <span>Requests</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>My Requests</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <span>Create Request</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- MASTER DATA -->
        <div>
            <h3 class="text-xs uppercase text-slate-400 font-semibold mb-2 px-3">Master Data</h3>
            <ul class="space-y-1">
                @php
                    $clientsActive = request()->routeIs('clients.*');
                @endphp
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md font-medium text-sm transition-colors {{ $clientsActive ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}"
                       href="{{ route('clients.index') }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span>Clients</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        <span>Categories</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- REPORT -->
        <div>
            <h3 class="text-xs uppercase text-slate-400 font-semibold mb-2 px-3">Report</h3>
            <ul class="space-y-1">
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Request Reports</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        <span>Performance</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- SYSTEM -->
        <div>
            <h3 class="text-xs uppercase text-slate-400 font-semibold mb-2 px-3">System</h3>
            <ul class="space-y-1">
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-md text-slate-600 hover:text-red-600 hover:bg-red-50 font-medium text-sm transition-colors cursor-not-allowed" href="#" onclick="return false;">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
</div>
	