@extends('layouts.app')

@section('header_title', 'Create Client')

@section('content')
<div class="max-w-2xl mx-auto space-y-5">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm text-slate-500">
        <a href="{{ route('clients.index') }}" class="hover:text-indigo-600 transition">Clients</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-slate-700 font-medium">Create Client</span>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="mb-6">
            <h1 class="text-xl font-bold text-slate-800">Create Client</h1>
            <p class="text-sm text-slate-500 mt-0.5">Add a new client to the system.</p>
        </div>

        @include('clients._form', [
            'action'      => route('clients.store'),
            'method'      => 'POST',
            'submitLabel' => 'Save Client',
        ])
    </div>

</div>
@endsection
