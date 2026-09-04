@extends('layouts.app')

@section('header_title', 'Clients')

@section('content')
<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Clients</h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola data client yang terdaftar pada sistem.
            </p>
        </div>

        <a href="{{ route('clients.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 4v16m8-8H4"/>
            </svg>

            Add Client
        </a>
    </div>


    {{-- Success Alert --}}
    @if(session('success'))
        <div id="flash-success"
             class="flex items-center gap-3 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M5 13l4 4L19 7"/>
            </svg>

            <span>{{ session('success') }}</span>
        </div>
    @endif


    {{-- Search + Table --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        {{-- Search --}}
        <div class="border-b border-slate-200 p-4">
            <form method="GET"
                  action="{{ route('clients.index') }}"
                  class="flex flex-col gap-3 sm:flex-row">

                <div class="relative flex-1">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="pointer-events-none absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"/>
                    </svg>

                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Search client..."
                        class="w-full rounded-lg border border-slate-300 bg-white py-2.5 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >
                </div>

                <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-slate-900">
                    Search
                </button>

                @if(!empty($search))
                    <a href="{{ route('clients.index') }}"
                       class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50">
                        Reset
                    </a>
                @endif

            </form>
        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-6 py-4 font-semibold">No</th>
                        <th class="px-6 py-4 font-semibold">Client</th>
                        <th class="px-6 py-4 font-semibold">Company</th>
                        <th class="px-6 py-4 font-semibold">Email</th>
                        <th class="px-6 py-4 font-semibold">Phone</th>
                        <th class="px-6 py-4 font-semibold">Address</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 text-right font-semibold">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($clients as $client)

                        <tr class="transition hover:bg-slate-50">

                            {{-- No --}}
                            <td class="whitespace-nowrap px-6 py-5 text-slate-500">
                                {{ $clients->firstItem() + $loop->index }}
                            </td>


                            {{-- Client --}}
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">

                                    {{-- Avatar --}}
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-600">
                                        {{ strtoupper(substr($client->nama_client, 0, 1)) }}
                                    </div>

                                    <div>
                                        <p class="font-semibold text-slate-800">
                                            {{ $client->nama_client }}
                                        </p>

                                        <p class="mt-0.5 text-xs text-slate-400">
                                            {{ $client->kode_client }}
                                        </p>
                                    </div>

                                </div>
                            </td>


                            {{-- Company --}}
                            <td class="px-6 py-5 text-slate-600">
                                {{ $client->nama_perusahaan ?: '—' }}
                            </td>


                            {{-- Email --}}
                            <td class="px-6 py-5 text-slate-600">
                                {{ $client->email ?: '—' }}
                            </td>


                            {{-- Phone --}}
                            <td class="px-6 py-5 text-slate-600">
                                {{ $client->no_telepon ?: '—' }}
                            </td>

                            {{-- Address --}}
                            <td class="px-6 py-5">
                                <div class="max-w-xs truncate text-slate-600" title="{{ $client->alamat }}">
                                    {{ $client->alamat ?: '—' }}
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-5">

                                @if($client->is_active)

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Active
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            {{-- Action --}}
                            <td class="px-6 py-5 text-right">

                                <a href="{{ route('clients.show', $client) }}"
                                   class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="2">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        <circle cx="12"
                                                cy="12"
                                                r="3"/>
                                    </svg>

                                    View
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-6 w-6 text-slate-400"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"/>
                                        </svg>
                                    </div>

                                    <p class="font-semibold text-slate-700">
                                        No clients found
                                    </p>

                                    <p class="mt-1 text-sm text-slate-400">
                                        Belum ada client yang tersedia.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($clients->hasPages())

            <div class="border-t border-slate-200 px-6 py-4">
                {{ $clients->links() }}
            </div>

        @endif

    </div>

</div>


{{-- Auto hide success alert --}}
@if(session('success'))
<script>
    setTimeout(() => {
        const alert = document.getElementById('flash-success');

        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';

            setTimeout(() => {
                alert.remove();
            }, 500);
        }
    }, 3000);
</script>
@endif

@endsection