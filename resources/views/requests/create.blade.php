@extends('layouts.app')

@section('header_title', 'Create Request')

@section('content')

<div class="px-4 sm:px-6 py-6">

    <div class="max-w-4xl mx-auto">

        {{-- Header --}}
        <div class="mb-6">
            <div class="flex items-center justify-between">

                <div>
                    <h1 class="text-2xl font-semibold text-slate-800">
                        Create Request
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        Create a new client request
                    </p>
                </div>

                <a
                    href="{{ route('requests.index') }}"
                    class="text-sm text-slate-600 hover:text-indigo-600"
                >
                    ← Back to Requests
                </a>

            </div>
        </div>


        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-5 rounded-lg bg-green-50 border border-green-200 px-4 py-3">
                <p class="text-sm text-green-700">
                    {{ session('success') }}
                </p>
            </div>
        @endif


        {{-- Error Message --}}
        @if($errors->any())
            <div class="mb-5 rounded-lg bg-red-50 border border-red-200 px-4 py-3">

                <p class="text-sm font-medium text-red-700 mb-2">
                    Please fix the following errors:
                </p>

                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        {{-- Form --}}
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm">

            <form
                action="{{ route('requests.store') }}"
                method="POST"
            >

                @csrf


                {{-- Form Content --}}
                <div class="p-6">


                    {{-- Client --}}
                    <div class="mb-5">

                        <label
                            for="client_id"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Client <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="client_id"
                            name="client_id"
                            required
                            class="w-full px-4 py-2.5 border border-slate-300
                                   rounded-lg text-sm bg-white
                                   focus:ring-2 focus:ring-indigo-500
                                   focus:border-indigo-500 outline-none"
                        >

                            <option value="">
                                Select Client
                            </option>

                            @foreach($clients as $client)

                                <option
                                    value="{{ $client->id }}"
                                    {{ old('client_id') == $client->id ? 'selected' : '' }}
                                >
                                    {{ $client->name }}

                                    @if($client->company)
                                        - {{ $client->company }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        @error('client_id')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Category --}}
                    <div class="mb-5">

                        <label
                            for="category_id"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Category <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="category_id"
                            name="category_id"
                            required
                            class="w-full px-4 py-2.5 border border-slate-300
                                   rounded-lg text-sm bg-white
                                   focus:ring-2 focus:ring-indigo-500
                                   focus:border-indigo-500 outline-none"
                        >

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                        @error('category_id')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Subject --}}
                    <div class="mb-5">

                        <label
                            for="subject"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Request Subject <span class="text-red-500">*</span>
                        </label>

                        <input
                            id="subject"
                            type="text"
                            name="subject"
                            value="{{ old('subject') }}"
                            placeholder="Enter request subject"
                            maxlength="255"
                            required
                            class="w-full px-4 py-2.5 border border-slate-300
                                   rounded-lg text-sm
                                   focus:ring-2 focus:ring-indigo-500
                                   focus:border-indigo-500 outline-none"
                        >

                        @error('subject')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="mb-5">

                        <label
                            for="description"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Description <span class="text-red-500">*</span>
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            required
                            placeholder="Describe the request in detail..."
                            class="w-full px-4 py-2.5 border border-slate-300
                                   rounded-lg text-sm resize-y
                                   focus:ring-2 focus:ring-indigo-500
                                   focus:border-indigo-500 outline-none"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Priority --}}
                    <div class="mb-5">

                        <label
                            for="priority"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Priority <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="priority"
                            name="priority"
                            required
                            class="w-full px-4 py-2.5 border border-slate-300
                                   rounded-lg text-sm bg-white
                                   focus:ring-2 focus:ring-indigo-500
                                   focus:border-indigo-500 outline-none"
                        >

                            <option
                                value="low"
                                {{ old('priority', 'medium') === 'low' ? 'selected' : '' }}
                            >
                                Low
                            </option>

                            <option
                                value="medium"
                                {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}
                            >
                                Medium
                            </option>

                            <option
                                value="high"
                                {{ old('priority') === 'high' ? 'selected' : '' }}
                            >
                                High
                            </option>

                            <option
                                value="urgent"
                                {{ old('priority') === 'urgent' ? 'selected' : '' }}
                            >
                                Urgent
                            </option>

                        </select>

                        @error('priority')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="mb-5">

                        <label
                            for="status"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Status <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full px-4 py-2.5 border border-slate-300
                                   rounded-lg text-sm bg-white
                                   focus:ring-2 focus:ring-indigo-500
                                   focus:border-indigo-500 outline-none"
                        >

                            <option
                                value="pending"
                                {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>

                            <option
                                value="in_progress"
                                {{ old('status') === 'in_progress' ? 'selected' : '' }}
                            >
                                In Progress
                            </option>

                            <option
                                value="completed"
                                {{ old('status') === 'completed' ? 'selected' : '' }}
                            >
                                Completed
                            </option>

                            <option
                                value="cancelled"
                                {{ old('status') === 'cancelled' ? 'selected' : '' }}
                            >
                                Cancelled
                            </option>

                        </select>

                        @error('status')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Due Date --}}
                    <div class="mb-2">

                        <label
                            for="due_date"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Due Date
                        </label>

                        <input
                            id="due_date"
                            type="date"
                            name="due_date"
                            value="{{ old('due_date') }}"
                            class="w-full px-4 py-2.5 border border-slate-300
                                   rounded-lg text-sm
                                   focus:ring-2 focus:ring-indigo-500
                                   focus:border-indigo-500 outline-none"
                        >

                        <p class="text-xs text-slate-500 mt-1">
                            Optional. Set a deadline for completing this request.
                        </p>

                        @error('due_date')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Footer / Buttons --}}
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-200
                            rounded-b-xl flex justify-end gap-3">

                    <a
                        href="{{ route('requests.index') }}"
                        class="px-5 py-2.5 border border-slate-300
                               bg-white text-slate-700 text-sm font-medium
                               rounded-lg hover:bg-slate-50 transition"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 bg-indigo-600 text-white
                               text-sm font-medium rounded-lg
                               hover:bg-indigo-700 transition"
                    >
                        Create Request
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection