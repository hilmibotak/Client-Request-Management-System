@extends('layouts.app')

@section('header_title', 'Edit Client')

@section('content')
<div class="max-w-2xl mx-auto space-y-5">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm text-slate-500">
        <a href="{{ route('clients.index') }}" class="hover:text-indigo-600 transition">Clients</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <a href="{{ route('clients.show', $client) }}" class="hover:text-indigo-600 transition">{{ $client->name }}</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-slate-700 font-medium">Edit</span>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="mb-6">
            <h1 class="text-xl font-bold text-slate-800">Edit Client</h1>
            <p class="text-sm text-slate-500 mt-0.5">Update information for <span class="font-medium text-slate-700">{{ $client->name }}</span>.</p>
        </div>

        @include('clients._form', [
            'action'      => route('clients.update', $client),
            'method'      => 'PUT',
            'client'      => $client,
            'submitLabel' => 'Update Client',
        ])
    </div>

</div>
@endsection
