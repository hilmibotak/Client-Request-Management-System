@props(['status'])

@php
    $statusClasses = [
        'pending' => 'bg-amber-100 text-amber-700 border-amber-200',
        'in_progress' => 'bg-blue-100 text-blue-700 border-blue-200',
        'completed' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
        'rejected' => 'bg-rose-100 text-rose-700 border-rose-200',
    ];

    $statusLabels = [
        'pending' => 'Pending',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
        'rejected' => 'Rejected',
    ];

    $classes = $statusClasses[$status] ?? 'bg-gray-100 text-gray-700 border-gray-200';
    $label = $statusLabels[$status] ?? ucfirst(str_replace('_', ' ', $status));
@endphp

<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold border {{ $classes }}">
    @if($status === 'pending')
        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    @elseif($status === 'in_progress')
        <svg class="w-3 h-3 mr-1 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
    @elseif($status === 'completed')
        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    @elseif($status === 'rejected')
        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    @endif
    {{ $label }}
</span>
