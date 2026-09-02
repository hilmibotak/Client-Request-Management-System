@props(['title', 'value', 'icon', 'color' => 'indigo', 'trend' => null])

@php
    $colorClasses = [
        'indigo' => 'bg-indigo-50 text-indigo-600',
        'blue' => 'bg-blue-50 text-blue-600',
        'green' => 'bg-emerald-50 text-emerald-600',
        'yellow' => 'bg-amber-50 text-amber-600',
        'red' => 'bg-rose-50 text-rose-600',
    ];
    $iconBg = $colorClasses[$color] ?? $colorClasses['indigo'];
@endphp

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition-shadow">
    <div class="flex items-start justify-between">
        <div>
            <h4 class="text-sm font-medium text-slate-500 mb-1">{{ $title }}</h4>
            <div class="text-2xl font-bold text-slate-800">{{ $value }}</div>
            
            @if($trend)
            <div class="mt-2 flex items-center text-xs">
                @if(str_starts_with($trend, '+'))
                    <span class="text-emerald-600 font-medium bg-emerald-50 px-1.5 py-0.5 rounded">
                        {{ $trend }}
                    </span>
                @else
                    <span class="text-rose-600 font-medium bg-rose-50 px-1.5 py-0.5 rounded">
                        {{ $trend }}
                    </span>
                @endif
                <span class="text-slate-400 ml-2">vs last month</span>
            </div>
            @endif
        </div>
        
        <div class="w-10 h-10 shrink-0 rounded-lg flex items-center justify-center {{ $iconBg }}">
            {!! $icon !!}
        </div>
    </div>
</div>
