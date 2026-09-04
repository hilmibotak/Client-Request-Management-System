@extends('layouts.app')

@section('header_title', 'Client Details')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500">
                <a href="{{ route('clients.index') }}"
                   class="transition hover:text-indigo-600">
                    Clients
                </a>

                <span>/</span>

                <span class="text-slate-700">Client Details</span>
            </div>

            <div class="mt-3 flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100 text-lg font-bold text-indigo-600">
                    {{ strtoupper(substr($client->nama_client, 0, 1)) }}
                </div>

                <div>
                    <h1 class="text-2xl font-bold text-slate-800">
                        {{ $client->nama_client }}
                    </h1>

                    <p class="text-sm text-slate-500">
                        {{ $client->kode_client }}
                    </p>
                </div>

            </div>
        </div>


        {{-- Status --}}
        <div>
            @if($client->is_active)

                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    Active
                </span>

            @else

                <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                    <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                    Inactive
                </span>

            @endif
        </div>

    </div>


    {{-- Client Information --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 px-6 py-4">
            <h2 class="font-semibold text-slate-800">
                Client Information
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Informasi lengkap mengenai client.
            </p>
        </div>


        <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">

            {{-- Kode Client --}}
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Kode Client
                </p>

                <p class="mt-1 font-medium text-slate-800">
                    {{ $client->kode_client }}
                </p>
            </div>


            {{-- Nama Client --}}
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Nama Client
                </p>

                <p class="mt-1 font-medium text-slate-800">
                    {{ $client->nama_client }}
                </p>
            </div>


            {{-- Nama Perusahaan --}}
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Nama Perusahaan
                </p>

                <p class="mt-1 font-medium text-slate-800">
                    {{ $client->nama_perusahaan ?: '—' }}
                </p>
            </div>


            {{-- Email --}}
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Email
                </p>

                @if($client->email)

                    <a href="mailto:{{ $client->email }}"
                       class="mt-1 block font-medium text-indigo-600 hover:text-indigo-700">
                        {{ $client->email }}
                    </a>

                @else

                    <p class="mt-1 font-medium text-slate-500">
                        —
                    </p>

                @endif
            </div>


            {{-- No Telepon --}}
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    No. Telepon
                </p>

                <p class="mt-1 font-medium text-slate-800">
                    {{ $client->no_telepon ?: '—' }}
                </p>
            </div>


            {{-- Status --}}
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Status
                </p>

                <div class="mt-2">

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

                </div>
            </div>


            {{-- Address --}}
            <div class="md:col-span-2">

                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Alamat
                </p>

                <p class="mt-1 whitespace-pre-line font-medium text-slate-800">
                    {{ $client->alamat ?: '—' }}
                </p>

            </div>

        </div>

    </div>


    {{-- Timestamps --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                Created At
            </p>

            <p class="mt-2 text-sm font-medium text-slate-700">
                {{ $client->created_at->format('d M Y, H:i') }}
            </p>
        </div>


        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                Updated At
            </p>

            <p class="mt-2 text-sm font-medium text-slate-700">
                {{ $client->updated_at->format('d M Y, H:i') }}
            </p>
        </div>

    </div>


    {{-- Actions --}}
    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">

        <a href="{{ route('clients.index') }}"
           class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-50">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-4 w-4"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15 19l-7-7 7-7"/>
            </svg>

            Back
        </a>


        <div class="flex gap-3">

            {{-- Delete --}}
            <form action="{{ route('clients.destroy', $client) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus client ini?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-50">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-3a1 1 0 00-1 1v3m-4 0h12"/>
                    </svg>

                    Delete
                </button>

            </form>


            {{-- Edit --}}
            <a href="{{ route('clients.edit', $client) }}"
               class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 8.5-8.5z"/>
                </svg>

                Edit Client
            </a>

        </div>

    </div>

</div>

@endsection