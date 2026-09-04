@extends('layouts.app')

@section('header_title', 'Categories')

@section('content')

<div class="px-4 sm:px-6 py-6">

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"/>
            </svg>

            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-semibold text-slate-800">
                Categories
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Manage client request categories.
            </p>
        </div>

        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700">

            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>

            Add Category
        </a>

    </div>


    {{-- Summary Card --}}
    <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        <div class="rounded-xl border border-slate-200 bg-white p-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total Categories
                    </p>

                    <p class="mt-2 text-2xl font-semibold text-slate-800">
                        {{ $categories->total() }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-indigo-50">

                    <svg class="h-6 w-6 text-indigo-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M7 7h10M7 11h10M7 15h6"/>

                    </svg>

                </div>

            </div>

        </div>

    </div>


    {{-- Main Card --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">

        {{-- Search --}}
        <div class="border-b border-slate-200 p-4 sm:p-5">

            <form action="{{ route('categories.index') }}"
                  method="GET"
                  class="flex flex-col gap-3 sm:flex-row">

                <div class="relative flex-1">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">

                        <svg class="h-5 w-5 text-slate-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"/>

                        </svg>

                    </div>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search categories..."
                        class="w-full rounded-lg border border-slate-300 py-2.5 pl-10 pr-4 text-sm text-slate-700 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >

                </div>

                <button
                    type="submit"
                    class="rounded-lg bg-slate-800 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-slate-900">

                    Search

                </button>

                @if(request('search'))

                    <a
                        href="{{ route('categories.index') }}"
                        class="rounded-lg border border-slate-300 px-5 py-2.5 text-center text-sm font-medium text-slate-600 transition hover:bg-slate-50">

                        Reset

                    </a>

                @endif

            </form>

        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[700px]">

                <thead class="bg-slate-50">

                    <tr class="border-b border-slate-200">

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Category
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Description
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($categories as $category)

                        <tr class="transition hover:bg-slate-50">

                            {{-- Category --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-indigo-50">

                                        <span class="text-sm font-semibold text-indigo-600">
                                            {{ strtoupper(substr($category->name, 0, 1)) }}
                                        </span>

                                    </div>

                                    <div>

                                        <p class="font-medium text-slate-800">
                                            {{ $category->name }}
                                        </p>

                                        <p class="text-xs text-slate-400">
                                            Category #{{ $category->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- Description --}}
                            <td class="px-6 py-4">

                                <p class="max-w-md truncate text-sm text-slate-500"
                                   title="{{ $category->description }}">

                                    {{ $category->description ?: 'No description available' }}

                                </p>

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                @if ($category->status === 'active')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                        Active

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600">

                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('categories.edit', $category) }}"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-medium text-slate-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600">

                                        <svg class="h-4 w-4"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M11 5h2m-8 9 9-9 4 4-9 9H5v-4z"/>

                                        </svg>

                                        Edit

                                    </a>


                                    <form
                                        action="{{ route('categories.destroy', $category) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-white px-3 py-2 text-xs font-medium text-red-600 transition hover:bg-red-50">

                                            <svg class="h-4 w-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M6 7h12m-9 0v10m6-10v10M9 7V4h6v3m-8 0 1 13h8l1-13"/>

                                            </svg>

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="px-6 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">

                                        <svg class="h-6 w-6 text-slate-400"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6l5 5v11a2 2 0 0 1-2 2z"/>

                                        </svg>

                                    </div>

                                    <p class="font-medium text-slate-700">
                                        No categories found
                                    </p>

                                    <p class="mt-1 text-sm text-slate-400">
                                        Try another search or create a new category.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($categories->hasPages())

            <div class="border-t border-slate-200 px-4 py-4 sm:px-6">

                {{ $categories->appends(request()->query())->links() }}

            </div>

        @endif

    </div>

</div>

@endsection