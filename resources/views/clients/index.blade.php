@extends('layouts.app')

@section('header_title', 'Clients')

@section('content')
<div class="space-y-5">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Clients</h1>
            <p class="text-sm text-slate-500 mt-0.5">Manage your clients information.</p>
        </div>
        <a href="{{ route('clients.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Client
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
    <div id="flash-success" class="flex items-center gap-3 px-4 py-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm">
        <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span class="font-medium">{{ session('success') }}</span>
        <button onclick="document.getElementById('flash-success').remove()" class="ml-auto text-emerald-500 hover:text-emerald-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    @endif

    {{-- Search & Table Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">

        {{-- Search Bar --}}
        <div class="p-4 border-b border-slate-100">
            <form method="GET" action="{{ route('clients.index') }}" class="flex gap-3">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search clients by name, email, or company..."
                        class="w-full pl-10 pr-4 py-2 text-sm border border-slate-200 rounded-lg bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition placeholder-slate-400"
                    >
                </div>
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition">
                    Search
                </button>
                @if($search)
                <a href="{{ route('clients.index') }}"
                   class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 rounded-lg transition">
                    Clear
                </a>
                @endif
            </form>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 border-b border-slate-200 text-xs text-slate-500 uppercase tracking-wide">
                    <tr>
                        <th class="px-5 py-3.5 font-semibold whitespace-nowrap">No</th>
                        <th class="px-5 py-3.5 font-semibold">Name</th>
                        <th class="px-5 py-3.5 font-semibold">Email</th>
                        <th class="px-5 py-3.5 font-semibold whitespace-nowrap">Phone</th>
                        <th class="px-5 py-3.5 font-semibold">Company</th>
                        <th class="px-5 py-3.5 font-semibold whitespace-nowrap">Status</th>
                        <th class="px-5 py-3.5 font-semibold whitespace-nowrap">Created At</th>
                        <th class="px-5 py-3.5 font-semibold text-right whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($clients as $client)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-5 py-4 text-slate-500 whitespace-nowrap">
                            {{ $clients->firstItem() + $loop->index }}
                        </td>
                        <td class="px-5 py-4">
                            <div class="font-semibold text-slate-800">{{ $client->name }}</div>
                        </td>
                        <td class="px-5 py-4 text-slate-600">
                            {{ $client->email ?? '—' }}
                        </td>
                        <td class="px-5 py-4 text-slate-600 whitespace-nowrap">
                            {{ $client->phone ?? '—' }}
                        </td>
                        <td class="px-5 py-4 text-slate-600">
                            {{ $client->company ?? '—' }}
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap">
                            @if($client->status === 'active')
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-600">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-slate-500 whitespace-nowrap">
                            {{ $client->created_at->format('d M Y') }}
                        </td>
                        <td class="px-5 py-4 text-right whitespace-nowrap">
                            {{-- View --}}
                            <a href="{{ route('clients.show', $client) }}"
                               class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-md transition">
                                View
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-5 py-16 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <div>
                                    <p class="text-slate-500 font-medium">No clients found.</p>
                                    @if($search)
                                        <p class="text-slate-400 text-xs mt-1">No results for "<span class="font-medium">{{ $search }}</span>".</p>
                                    @endif
                                </div>
                                <a href="{{ route('clients.create') }}"
                                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Add Client
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($clients->hasPages())
        <div class="px-5 py-4 border-t border-slate-100">
            {{ $clients->links() }}
        </div>
        @endif

    </div>
</div>
@endsection
