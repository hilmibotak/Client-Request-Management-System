{{-- Reusable form partial for create & edit --}}
{{-- Required variables: $action, $method --}}
{{-- Optional: $client (for edit pre-fill), $submitLabel --}}

@php
    $clientModel = $client ?? null;
@endphp

<form action="{{ $action }}" method="POST" class="space-y-6">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    {{-- Name & Email Row --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                Name <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', optional($clientModel)->name) }}"
                placeholder="e.g. PT Maju Bersama"
                class="w-full rounded-lg border @error('name') border-red-400 bg-red-50 @else border-slate-300 bg-white @enderror px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
            >
            @error('name')
                <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
                Email
            </label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', optional($clientModel)->email) }}"
                placeholder="e.g. contact@company.com"
                class="w-full rounded-lg border @error('email') border-red-400 bg-red-50 @else border-slate-300 bg-white @enderror px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
            >
            @error('email')
                <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    {{-- Phone & Company Row --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Phone --}}
        <div>
            <label for="phone" class="block text-sm font-medium text-slate-700 mb-1.5">
                Phone
            </label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', optional($clientModel)->phone) }}"
                placeholder="e.g. +62 812 3456 7890"
                class="w-full rounded-lg border @error('phone') border-red-400 bg-red-50 @else border-slate-300 bg-white @enderror px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
            >
            @error('phone')
                <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Company --}}
        <div>
            <label for="company" class="block text-sm font-medium text-slate-700 mb-1.5">
                Company
            </label>
            <input
                type="text"
                id="company"
                name="company"
                value="{{ old('company', optional($clientModel)->company) }}"
                placeholder="e.g. PT Digital Indonesia"
                class="w-full rounded-lg border @error('company') border-red-400 bg-red-50 @else border-slate-300 bg-white @enderror px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
            >
            @error('company')
                <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    {{-- Address --}}
    <div>
        <label for="address" class="block text-sm font-medium text-slate-700 mb-1.5">
            Address
        </label>
        <textarea
            id="address"
            name="address"
            rows="3"
            placeholder="e.g. Jl. Sudirman No. 100, Jakarta"
            class="w-full rounded-lg border @error('address') border-red-400 bg-red-50 @else border-slate-300 bg-white @enderror px-3.5 py-2.5 text-sm text-slate-800 placeholder-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition resize-none"
        >{{ old('address', optional($clientModel)->address) }}</textarea>
        @error('address')
            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Status --}}
    <div>
        <label for="status" class="block text-sm font-medium text-slate-700 mb-1.5">
            Status <span class="text-red-500">*</span>
        </label>
        <select
            id="status"
            name="status"
            class="w-full rounded-lg border @error('status') border-red-400 bg-red-50 @else border-slate-300 bg-white @enderror px-3.5 py-2.5 text-sm text-slate-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
        >
            @php
                $currentStatus = old('status', optional($clientModel)->status ?? 'active');
            @endphp
            <option value="active"   {{ $currentStatus === 'active'   ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $currentStatus === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Action Buttons --}}
    <div class="flex items-center justify-end gap-3 pt-2 border-t border-slate-100">
        <a href="{{ route('clients.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 hover:border-slate-400 transition">
            Cancel
        </a>
        <button type="submit"
                class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            {{ $submitLabel ?? 'Save Client' }}
        </button>
    </div>
</form>
