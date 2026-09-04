@extends('layouts.app')

@section('header_title', 'Profile')

@section('content')

<div class="max-w-3xl mx-auto">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-5 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Profile Card --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800">
                My Profile
            </h3>

            <p class="text-sm text-slate-500 mt-1">
                Manage your account information
            </p>
        </div>

        {{-- Form --}}
        <form
            action="{{ route('profile.update') }}"
            method="POST"
            class="p-6"
        >
            @csrf
            @method('PUT')

            {{-- Avatar --}}
            <div class="flex items-center gap-4 mb-6">

                <img
                    class="w-16 h-16 rounded-full border border-slate-200 object-cover"
                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=4f46e5&color=fff"
                    alt="{{ $user->name }}"
                >

                <div>
                    <h4 class="font-semibold text-slate-800">
                        {{ $user->name }}
                    </h4>

                    <p class="text-sm text-slate-500">
                        {{ $user->email }}
                    </p>
                </div>

            </div>


            {{-- Name --}}
            <div class="mb-5">

                <label
                    for="name"
                    class="block text-sm font-medium text-slate-700 mb-2"
                >
                    Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                    required
                >

                @error('name')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Email --}}
            <div class="mb-6">

                <label
                    for="email"
                    class="block text-sm font-medium text-slate-700 mb-2"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                    required
                >

                @error('email')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Buttons --}}
            <div class="flex justify-end gap-3">

                <a
                    href="{{ url()->previous() }}"
                    class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200 transition"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>

@endsection