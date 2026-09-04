<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - CRMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50">

    <div class="flex min-h-screen items-center justify-center px-4">

        <div class="w-full max-w-md">

            {{-- Logo / Brand --}}
            <div class="mb-8 text-center">

                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-600 shadow-md shadow-indigo-200">
                    <svg class="h-7 w-7 text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>

                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-slate-800">
                    CRMS
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Client Request Management System
                </p>

            </div>

            {{-- Login Card --}}
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-slate-800">
                        Welcome Back
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Sign in to your account to continue.
                    </p>
                </div>

                {{-- Validation Error --}}
                @if ($errors->any())
                    <div class="mb-5 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-600">
                        <ul class="list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">

                    @csrf

                    {{-- Email --}}
                    <div class="mb-4">

                        <label for="email"
                               class="mb-2 block text-sm font-medium text-slate-700">
                            Email
                        </label>

                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="email"
                               placeholder="Enter your email"
                               class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                    </div>

                    {{-- Password --}}
                    <div class="mb-6">

                        <label for="password"
                               class="mb-2 block text-sm font-medium text-slate-700">
                            Password
                        </label>

                        <input type="password"
                               id="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="Enter your password"
                               class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                    </div>

                    {{-- Login Button --}}
                    <button type="submit"
                            class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Sign In
                    </button>

                </form>

            </div>

            <p class="mt-6 text-center text-xs text-slate-400">
                &copy; {{ date('Y') }} CRMS. All rights reserved.
            </p>

        </div>

    </div>

</body>
</html>