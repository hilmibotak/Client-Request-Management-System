@props(['priority'])

@php
    $priorityClasses = [
        'low' => 'bg-gray-100 text-gray-600',
        'medium' => 'bg-blue-100 text-blue-600',
        'high' => 'bg-orange-100 text-orange-600',
        'urgent' => 'bg-rose-100 text-rose-600 animate-pulse',
    ];

    $priorityIcons = [
        'low' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>',
        'medium' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>',
        'high' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>',
        'urgent' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>',
    ];

    $classes = $priorityClasses[$priority] ?? 'bg-gray-100 text-gray-700';
    $icon = $priorityIcons[$priority] ?? '';
    $label = ucfirst($priority);
@endphp

<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $classes }}">
    @if($icon)
        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $icon !!}</svg>
    @endif
    {{ $label }}
</span>
