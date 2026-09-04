@extends('layouts.app')

@section('header_title', 'My Requests')

@section('content')

<div class="px-4 sm:px-6 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-semibold text-slate-800">
                My Requests
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Manage requests created by you
            </p>
        </div>

        <a href="{{ route('requests.create') }}"
           class="inline-flex items-center justify-center gap-2 px-4 py-2.5
                  bg-indigo-600 text-white text-sm font-medium rounded-lg
                  hover:bg-indigo-700">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>

            Create Request

        </a>

    </div>


    {{-- Search --}}
    <div class="bg-white border border-slate-200 rounded-xl p-4 mb-6">

        <form method="GET" action="{{ route('requests.my') }}">

            <div class="flex flex-col sm:flex-row gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search my requests..."
                    class="flex-1 px-4 py-2.5 border border-slate-300
                           rounded-lg text-sm focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500 outline-none"
                >

                <button
                    type="submit"
                    class="px-5 py-2.5 bg-slate-800 text-white rounded-lg
                           text-sm font-medium">

                    Search

                </button>

            </div>

        </form>

    </div>


    {{-- Table --}}
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            Request
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            Client
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            Category
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            Priority
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right font-semibold text-slate-600">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($requests as $request)

                        <tr class="hover:bg-slate-50">

                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-800">
                                    {{ $request->title }}
                                </div>

                                <div class="text-xs text-slate-500 mt-1">
                                    {{ $request->created_at->format('d M Y') }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $request->client->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $request->category->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4">

                                <span class="px-2.5 py-1 text-xs font-medium
                                    rounded-full
                                    {{ $request->priority === 'urgent'
                                        ? 'bg-red-100 text-red-700'
                                        : ($request->priority === 'high'
                                            ? 'bg-orange-100 text-orange-700'
                                            : ($request->priority === 'medium'
                                                ? 'bg-yellow-100 text-yellow-700'
                                                : 'bg-slate-100 text-slate-600')) }}">

                                    {{ ucfirst($request->priority) }}

                                </span>

                            </td>

                            <td class="px-6 py-4">

                                <span class="px-2.5 py-1 text-xs font-medium rounded-full
                                    {{ $request->status === 'completed'
                                        ? 'bg-green-100 text-green-700'
                                        : ($request->status === 'in_progress'
                                            ? 'bg-blue-100 text-blue-700'
                                            : ($request->status === 'cancelled'
                                                ? 'bg-red-100 text-red-700'
                                                : 'bg-yellow-100 text-yellow-700')) }}">

                                    {{ str_replace('_', ' ', ucfirst($request->status)) }}

                                </span>

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('requests.edit', $request) }}"
                                        class="px-3 py-1.5 text-xs font-medium
                                               text-indigo-600 bg-indigo-50
                                               rounded-lg hover:bg-indigo-100">

                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('requests.destroy', $request) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-3 py-1.5 text-xs font-medium
                                                   text-red-600 bg-red-50 rounded-lg">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6"
                                class="px-6 py-12 text-center text-slate-500">

                                You don't have any requests yet.

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($requests->hasPages())

            <div class="px-6 py-4 border-t border-slate-200">
                {{ $requests->links() }}
            </div>

        @endif

    </div>

</div>

@endsection