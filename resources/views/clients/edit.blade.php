@extends('layouts.app')

@section('header_title', 'Edit Client')

@section('content')
<div class="mx-auto max-w-3xl space-y-6">

    {{-- Header --}}
    <div>
        <div class="flex items-center gap-2 text-sm text-slate-500">
            <a href="{{ route('clients.index') }}" class="hover:text-indigo-600">
                Clients
            </a>
            <span>/</span>
            <a href="{{ route('clients.show', $client) }}" class="hover:text-indigo-600">
                {{ $client->nama_client }}
            </a>
            <span>/</span>
            <span class="text-slate-700">Edit</span>
        </div>

        <h1 class="mt-3 text-2xl font-bold text-slate-800">
            Edit Client
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi client.
        </p>
    </div>

    {{-- Form --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 p-6">

                {{-- Kode Client --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Kode Client
                    </label>

                    <input
                        type="text"
                        value="{{ $client->kode_client }}"
                        disabled
                        class="w-full rounded-lg border border-slate-200 bg-slate-100 px-4 py-2.5 text-sm text-slate-500"
                    >

                    <p class="mt-1 text-xs text-slate-400">
                        Kode client tidak dapat diubah.
                    </p>
                </div>

                {{-- Nama Client --}}
                <div>
                    <label for="nama_client" class="mb-2 block text-sm font-medium text-slate-700">
                        Nama Client <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_client"
                        name="nama_client"
                        value="{{ old('nama_client', $client->nama_client) }}"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >

                    @error('nama_client')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Perusahaan --}}
                <div>
                    <label for="nama_perusahaan" class="mb-2 block text-sm font-medium text-slate-700">
                        Nama Perusahaan
                    </label>

                    <input
                        type="text"
                        id="nama_perusahaan"
                        name="nama_perusahaan"
                        value="{{ old('nama_perusahaan', $client->nama_perusahaan) }}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >

                    @error('nama_perusahaan')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-700">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $client->email) }}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >

                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No Telepon --}}
                <div>
                    <label for="no_telepon" class="mb-2 block text-sm font-medium text-slate-700">
                        No Telepon
                    </label>

                    <input
                        type="text"
                        id="no_telepon"
                        name="no_telepon"
                        value="{{ old('no_telepon', $client->no_telepon) }}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >

                    @error('no_telepon')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div>
                    <label for="alamat" class="mb-2 block text-sm font-medium text-slate-700">
                        Alamat
                    </label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        rows="4"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >{{ old('alamat', $client->alamat) }}</textarea>

                    @error('alamat')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label for="is_active" class="mb-2 block text-sm font-medium text-slate-700">
                        Status
                    </label>

                    <select
                        id="is_active"
                        name="is_active"
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >
                        <option value="1" {{ old('is_active', $client->is_active) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ old('is_active', $client->is_active) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>

                    @error('is_active')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-between border-t border-slate-200 bg-slate-50 px-6 py-4">

                <a
                    href="{{ route('clients.show', $client) }}"
                    class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700"
                >
                    Update Client
                </button>

            </div>
        </form>

    </div>

</div>
@endsection