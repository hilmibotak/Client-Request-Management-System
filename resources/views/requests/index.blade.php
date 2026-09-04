@extends('layouts.app')

@section('header_title', 'Requests')

@section('content')

<div class="px-4 sm:px-6 py-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-semibold text-slate-800">
                Request Management
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Manage all client requests
            </p>
        </div>

        <a href="{{ route('requests.create') }}"
           class="inline-flex items-center justify-center gap-2 px-4 py-2.5
                  bg-indigo-600 text-white text-sm font-medium rounded-lg
                  hover:bg-indigo-700 transition">

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

        <form method="GET" action="{{ route('requests.index') }}">

            <div class="flex flex-col sm:flex-row gap-3">

                <div class="relative flex-1">

                    <svg class="absolute left-3 top-1/2 -translate-y-1/2
                               w-5 h-5 text-slate-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="m21 21-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0
                                 7 7 0 0 1 14 0z"/>
                    </svg>

                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Search request..."
                        class="w-full pl-10 pr-4 py-2.5 border border-slate-300
                               rounded-lg text-sm focus:ring-2 focus:ring-indigo-500
                               focus:border-indigo-500 outline-none"
                    >

                </div>

                <button
                    type="submit"
                    class="px-5 py-2.5 bg-slate-800 text-white rounded-lg
                           text-sm font-medium hover:bg-slate-900">

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

                        <th class="px-6 py-4 text-left font-semibold text-slate-600">
                            Due Date
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
                                    By {{ $request->user->name ?? '-' }}
                                </div>

                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $request->client->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $request->category->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4">

                                @if($request->priority === 'urgent')

                                    <span class="px-2.5 py-1 text-xs font-medium
                                                 rounded-full bg-red-100 text-red-700">
                                        Urgent
                                    </span>

                                @elseif($request->priority === 'high')

                                    <span class="px-2.5 py-1 text-xs font-medium
                                                 rounded-full bg-orange-100 text-orange-700">
                                        High
                                    </span>

                                @elseif($request->priority === 'medium')

                                    <span class="px-2.5 py-1 text-xs font-medium
                                                 rounded-full bg-yellow-100 text-yellow-700">
                                        Medium
                                    </span>

                                @else

                                    <span class="px-2.5 py-1 text-xs font-medium
                                                 rounded-full bg-slate-100 text-slate-600">
                                        Low
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                @if($request->status === 'pending')

                                    <span class="px-2.5 py-1 text-xs font-medium
                                                 rounded-full bg-yellow-100 text-yellow-700">
                                        Pending
                                    </span>

                                @elseif($request->status === 'in_progress')

                                    <span class="px-2.5 py-1 text-xs font-medium
                                                 rounded-full bg-blue-100 text-blue-700">
                                        In Progress
                                    </span>

                                @elseif($request->status === 'completed')

                                    <span class="px-2.5 py-1 text-xs font-medium
                                                 rounded-full bg-green-100 text-green-700">
                                        Completed
                                    </span>

                                @else

                                    <span class="px-2.5 py-1 text-xs font-medium
                                                 rounded-full bg-red-100 text-red-700">
                                        Cancelled
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $request->due_date ? $request->due_date->format('d M Y') : '-' }}
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
                                        onsubmit="return confirm('Are you sure you want to delete this request?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-3 py-1.5 text-xs font-medium
                                                   text-red-600 bg-red-50
                                                   rounded-lg hover:bg-red-100">

                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="px-6 py-12 text-center text-slate-500">

                                No requests found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($requests->hasPages())

            <div class="px-6 py-4 border-t border-slate-200">

                {{ $requests->links() }}

            </div>

        @endif

    </div>

</div>

@endsection