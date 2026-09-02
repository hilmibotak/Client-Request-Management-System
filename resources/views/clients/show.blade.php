@extends('layouts.app')

@section('header_title', 'Client Detail')

@section('content')
<div class="max-w-2xl mx-auto space-y-5">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm text-slate-500">
        <a href="{{ route('clients.index') }}" class="hover:text-indigo-600 transition">Clients</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-slate-700 font-medium">{{ $client->name }}</span>
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

    {{-- Detail Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

        {{-- Card Header --}}
        <div class="px-6 py-5 border-b border-slate-100 flex items-start justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-800">{{ $client->name }}</h1>
                    <p class="text-sm text-slate-500 mt-0.5">{{ $client->company ?? 'No company' }}</p>
                </div>
            </div>
            {{-- Status Badge --}}
            @if($client->status === 'active')
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-700 shrink-0">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Active
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-full bg-slate-100 text-slate-600 shrink-0">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                    Inactive
                </span>
            @endif
        </div>

        {{-- Detail Fields --}}
        <div class="divide-y divide-slate-50">

            {{-- Email --}}
            <div class="px-6 py-4 grid grid-cols-3 gap-4 items-start">
                <dt class="text-sm font-medium text-slate-500">Email</dt>
                <dd class="col-span-2 text-sm text-slate-800">
                    @if($client->email)
                        <a href="mailto:{{ $client->email }}" class="text-indigo-600 hover:text-indigo-700">{{ $client->email }}</a>
                    @else
                        <span class="text-slate-400">—</span>
                    @endif
                </dd>
            </div>

            {{-- Phone --}}
            <div class="px-6 py-4 grid grid-cols-3 gap-4 items-start">
                <dt class="text-sm font-medium text-slate-500">Phone</dt>
                <dd class="col-span-2 text-sm text-slate-800">{{ $client->phone ?? '—' }}</dd>
            </div>

            {{-- Company --}}
            <div class="px-6 py-4 grid grid-cols-3 gap-4 items-start">
                <dt class="text-sm font-medium text-slate-500">Company</dt>
                <dd class="col-span-2 text-sm text-slate-800">{{ $client->company ?? '—' }}</dd>
            </div>

            {{-- Address --}}
            <div class="px-6 py-4 grid grid-cols-3 gap-4 items-start">
                <dt class="text-sm font-medium text-slate-500">Address</dt>
                <dd class="col-span-2 text-sm text-slate-800 whitespace-pre-line">{{ $client->address ?? '—' }}</dd>
            </div>

            {{-- Created At --}}
            <div class="px-6 py-4 grid grid-cols-3 gap-4 items-start">
                <dt class="text-sm font-medium text-slate-500">Created At</dt>
                <dd class="col-span-2 text-sm text-slate-800">{{ $client->created_at->format('d M Y, H:i') }}</dd>
            </div>

            {{-- Updated At --}}
            <div class="px-6 py-4 grid grid-cols-3 gap-4 items-start">
                <dt class="text-sm font-medium text-slate-500">Updated At</dt>
                <dd class="col-span-2 text-sm text-slate-800">{{ $client->updated_at->format('d M Y, H:i') }}</dd>
            </div>

        </div>

        {{-- Card Footer: Actions --}}
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between gap-3">
            <a href="{{ route('clients.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </a>
            <div class="flex items-center gap-3">
                {{-- Delete --}}
                <form method="POST" action="{{ route('clients.destroy', $client) }}"
                      onsubmit="return confirm('Are you sure you want to delete this client?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-red-600 bg-red-50 border border-red-200 hover:bg-red-100 rounded-lg transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Delete
                    </button>
                </form>
                {{-- Edit --}}
                <a href="{{ route('clients.edit', $client) }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit Client
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
