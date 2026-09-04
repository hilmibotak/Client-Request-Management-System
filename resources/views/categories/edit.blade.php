@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Category</h1>
        <p class="mt-1 text-sm text-gray-500">
            Update category information.
        </p>
    </div>

    <div class="rounded-lg bg-white p-6 shadow">

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="mb-4">
                <label for="name" class="mb-2 block text-sm font-medium text-gray-700">
                    Name
                </label>

                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $category->name) }}"
                       required
                       maxlength="255"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-blue-500">

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="mb-2 block text-sm font-medium text-gray-700">
                    Description
                </label>

                <textarea id="description"
                          name="description"
                          rows="4"
                          class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>

                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div class="mb-6">
                <label for="status" class="mb-2 block text-sm font-medium text-gray-700">
                    Status
                </label>

                <select id="status"
                        name="status"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-blue-500">

                    <option value="active"
                        {{ old('status', $category->status) === 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="inactive"
                        {{ old('status', $category->status) === 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>

                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Action --}}
            <div class="flex gap-2">
                <a href="{{ route('categories.index') }}"
                   class="rounded-lg bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300">
                    Cancel
                </a>

                <button type="submit"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                    Update Category
                </button>
            </div>

        </form>

    </div>
</div>
@endsection 