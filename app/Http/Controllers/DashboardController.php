<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Request as ClientRequest;
use App\Models\RequestActivity;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Requests
        $totalRequests = ClientRequest::count();

        // Pending Requests
        $newRequests = ClientRequest::where('status', 'pending')->count();

        // In Progress Requests
        $inProgressRequests = ClientRequest::where('status', 'in_progress')->count();

        // Completed Requests
        $completedRequests = ClientRequest::where('status', 'completed')->count();

        // Cancelled Requests
        $rejectedRequests = ClientRequest::where('status', 'cancelled')->count();

        // Request by Priority
        $priorityOverview = [
            'low'    => ClientRequest::where('priority', 'low')->count(),
            'medium' => ClientRequest::where('priority', 'medium')->count(),
            'high'   => ClientRequest::where('priority', 'high')->count(),
            'urgent' => ClientRequest::where('priority', 'urgent')->count(),
        ];

        // Recent Requests
        $recentRequests = ClientRequest::with(['client', 'assignee'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Recent Activities
        $recentActivities = RequestActivity::with(['user', 'request'])
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Total Clients
        $totalClients = Client::count();

        return view('dashboard.index', compact(
            'totalRequests',
            'newRequests',
            'inProgressRequests',
            'completedRequests',
            'rejectedRequests',
            'priorityOverview',
            'recentRequests',
            'recentActivities',
            'totalClients'
        ));
    }
}