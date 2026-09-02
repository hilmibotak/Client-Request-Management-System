@extends('layouts.app')

@section('header_title', 'Dashboard')

@section('content')
<div class="space-y-6">
    
    <!-- Welcome Section -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
        <h2 class="text-2xl font-bold text-slate-800 mb-2">Welcome back, Admin! 👋</h2>
        <p class="text-slate-600">Here's what's happening with your client requests today.</p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4">
        <x-stat-card 
            title="Total Requests" 
            value="{{ $totalRequests }}" 
            trend="+12.5%" 
            color="indigo" 
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>' 
        />
        <x-stat-card 
            title="New Requests" 
            value="{{ $newRequests }}" 
            color="blue" 
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' 
        />
        <x-stat-card 
            title="In Progress" 
            value="{{ $inProgressRequests }}" 
            color="yellow" 
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' 
        />
        <x-stat-card 
            title="Completed" 
            value="{{ $completedRequests }}" 
            color="green" 
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' 
        />
        <x-stat-card 
            title="Rejected" 
            value="{{ $rejectedRequests }}" 
            trend="-2%" 
            color="red" 
            icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' 
        />
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Request Status Overview -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col h-full lg:col-span-2">
            <h3 class="text-base font-bold text-slate-800 mb-6">Request Status Overview</h3>
            <div class="grow flex flex-col justify-center items-center">
                <!-- Using a simple visual representation instead of a complex chart library for now -->
                <div class="w-40 h-40 rounded-full border-[12px] border-slate-100 relative flex items-center justify-center mb-6">
                    <div class="absolute inset-0 rounded-full border-[12px] border-indigo-500 rounded-r-none rounded-bl-none transform rotate-45"></div>
                    <div class="absolute inset-0 rounded-full border-[12px] border-emerald-400 rounded-t-none rounded-br-none transform -rotate-[75deg]"></div>
                    <div class="absolute inset-0 rounded-full border-[12px] border-amber-400 rounded-b-none rounded-tl-none transform rotate-[15deg]"></div>
                    <div class="text-center">
                        <span class="block text-2xl font-bold text-slate-800">{{ $totalRequests }}</span>
                        <span class="text-xs text-slate-500 uppercase tracking-wider">Total</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 w-full text-sm">
                    <div class="flex items-center"><div class="w-3 h-3 rounded-full bg-amber-400 mr-2 shrink-0"></div> <span class="truncate">Pending ({{ $newRequests }})</span></div>
                    <div class="flex items-center"><div class="w-3 h-3 rounded-full bg-blue-500 mr-2 shrink-0"></div> <span class="truncate">In Progress ({{ $inProgressRequests }})</span></div>
                    <div class="flex items-center"><div class="w-3 h-3 rounded-full bg-emerald-400 mr-2 shrink-0"></div> <span class="truncate">Completed ({{ $completedRequests }})</span></div>
                    <div class="flex items-center"><div class="w-3 h-3 rounded-full bg-rose-500 mr-2 shrink-0"></div> <span class="truncate">Rejected ({{ $rejectedRequests }})</span></div>
                </div>
            </div>
        </div>

        <!-- Priority Overview -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 lg:col-span-1">
            <h3 class="text-base font-bold text-slate-800 mb-6">Priority Overview</h3>
            <div class="space-y-6">
                @php
                    $priorities = [
                        ['label' => 'Low', 'key' => 'low', 'color' => 'bg-slate-400'],
                        ['label' => 'Medium', 'key' => 'medium', 'color' => 'bg-blue-500'],
                        ['label' => 'High', 'key' => 'high', 'color' => 'bg-orange-500'],
                        ['label' => 'Urgent', 'key' => 'urgent', 'color' => 'bg-rose-500'],
                    ];
                @endphp
                
                @foreach($priorities as $p)
                @php
                    $count = $priorityOverview[$p['key']];
                    $percent = $totalRequests > 0 ? round(($count / $totalRequests) * 100) : 0;
                @endphp
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <span class="text-sm font-medium text-slate-700">{{ $p['label'] }}</span>
                        <span class="text-sm font-bold text-slate-800">{{ $count }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2">
                        <div class="{{ $p['color'] }} h-2 rounded-full" style="width: {{ $percent }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Bottom Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">  
        <!--Recent Requests -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-0 overflow-hidden lg:col-span-2">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-base font-bold text-slate-800">Recent Requests</h3>
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">View All</a>
            </div>
            <div class="overflow-x-auto w-full">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-50">
                        <tr>
                            <th class="px-6 py-3 font-medium whitespace-nowrap">Request ID</th>
                            <th class="px-6 py-3 font-medium">Client / Subject</th>
                            <th class="px-6 py-3 font-medium whitespace-nowrap">Priority</th>
                            <th class="px-6 py-3 font-medium whitespace-nowrap">Status</th>
                            <th class="px-6 py-3 font-medium text-right whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentRequests as $request)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                                {{ $request->request_number }}
                                <div class="text-xs text-slate-400 font-normal mt-0.5">{{ $request->created_at->format('M d, Y') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-800 line-clamp-1" title="{{ $request->subject }}">{{ $request->subject }}</div>
                                <div class="text-xs text-slate-500 mt-0.5">{{ $request->client->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-priority-badge :priority="$request->priority" />
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-status-badge :status="$request->status" />
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <button class="text-indigo-600 hover:text-indigo-900 font-medium bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-md transition-colors cursor-not-allowed">View</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                                No requests found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Activity Timeline -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 lg:col-span-1">
            <h3 class="text-base font-bold text-slate-800 mb-6">Recent Activity</h3>
            
            <div class="relative border-l border-slate-200 ml-3 space-y-6">
                @forelse($recentActivities as $activity)
                <div class="relative pl-5">
                    <span class="absolute -left-[5px] top-1.5 w-2 h-2 rounded-full bg-indigo-500 ring-4 ring-white"></span>
                    <div class="flex flex-col mb-1">
                        <h4 class="text-sm font-bold text-slate-800">
                            {{ $activity->user->name ?? 'System' }}
                            <span class="font-normal text-slate-500 ml-1">{{ strtolower($activity->activity) }}</span>
                        </h4>
                        <time class="text-xs text-slate-400 mt-0.5">{{ $activity->created_at->diffForHumans() }}</time>
                    </div>
                    <p class="text-sm text-slate-600 mt-1">
                        <span class="font-medium text-indigo-600">{{ $activity->request->request_number ?? 'REQ' }}</span> 
                        {{ $activity->description }}
                    </p>
                </div>
                @empty
                <div class="pl-5 text-sm text-slate-500">No recent activity.</div>
                @endforelse
            </div>
            
        </div>

    </div>

</div>
@endsection 
