@extends('layouts.app')

@section('header_title', 'Edit Request')

@section('content')

<div class="px-4 sm:px-6 py-6">

    <div class="max-w-4xl mx-auto">

        <div class="mb-6">

            <h1 class="text-2xl font-semibold text-slate-800">
                Edit Request
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Update request information
            </p>

        </div>


        <div class="bg-white border border-slate-200 rounded-xl p-6">

            <form
                action="{{ route('requests.update', $request) }}"
                method="POST">

                @csrf
                @method('PUT')


                {{-- Client --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Client
                    </label>

                    <select
                        name="client_id"
                        class="w-full px-4 py-2.5 border border-slate-300
                               rounded-lg text-sm focus:ring-2 focus:ring-indigo-500
                               outline-none">

                        @foreach($clients as $client)

                            <option
                                value="{{ $client->id }}"
                                {{ old('client_id', $request->client_id) == $client->id ? 'selected' : '' }}>

                                {{ $client->name }}

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

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="w-full px-4 py-2.5 border border-slate-300
                               rounded-lg text-sm focus:ring-2 focus:ring-indigo-500
                               outline-none">

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $request->category_id) == $category->id ? 'selected' : '' }}>

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


                {{-- Title --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Request Title
                    </label>

                    <input
                        type="text"
                        name="subject"
                        value="{{ old('subject', $request->subject) }}"
                        placeholder="Enter request subject"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg">

                    @error('subject')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Description --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full px-4 py-2.5 border border-slate-300
                               rounded-lg text-sm focus:ring-2 focus:ring-indigo-500
                               outline-none">{{ old('description', $request->description) }}</textarea>

                    @error('description')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Priority --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Priority
                    </label>

                    <select
                        name="priority"
                        class="w-full px-4 py-2.5 border border-slate-300
                               rounded-lg text-sm focus:ring-2 focus:ring-indigo-500
                               outline-none">

                        <option value="low"
                            {{ old('priority', $request->priority) === 'low' ? 'selected' : '' }}>
                            Low
                        </option>

                        <option value="medium"
                            {{ old('priority', $request->priority) === 'medium' ? 'selected' : '' }}>
                            Medium
                        </option>

                        <option value="high"
                            {{ old('priority', $request->priority) === 'high' ? 'selected' : '' }}>
                            High
                        </option>

                        <option value="urgent"
                            {{ old('priority', $request->priority) === 'urgent' ? 'selected' : '' }}>
                            Urgent
                        </option>

                    </select>

                </div>


                {{-- Status --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full px-4 py-2.5 border border-slate-300
                               rounded-lg text-sm focus:ring-2 focus:ring-indigo-500
                               outline-none">

                        <option value="pending"
                            {{ old('status', $request->status) === 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="in_progress"
                            {{ old('status', $request->status) === 'in_progress' ? 'selected' : '' }}>
                            In Progress
                        </option>

                        <option value="completed"
                            {{ old('status', $request->status) === 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                        <option value="cancelled"
                            {{ old('status', $request->status) === 'cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>

                </div>


                {{-- Due Date --}}
                <div class="mb-6">

                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Due Date
                    </label>

                    <input
                        type="date"
                        name="due_date"
                        value="{{ old(
                            'due_date',
                            $request->due_date
                                ? $request->due_date->format('Y-m-d')
                                : ''
                        ) }}"
                        class="w-full px-4 py-2.5 border border-slate-300
                               rounded-lg text-sm focus:ring-2 focus:ring-indigo-500
                               outline-none">

                </div>


                {{-- Buttons --}}
                <div class="flex justify-end gap-3">

                    <a
                        href="{{ route('requests.index') }}"
                        class="px-5 py-2.5 border border-slate-300
                               text-slate-700 text-sm font-medium rounded-lg
                               hover:bg-slate-50">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 bg-indigo-600 text-white
                               text-sm font-medium rounded-lg hover:bg-indigo-700">

                        Update Request

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection