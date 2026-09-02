<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Request as ClientRequest;
use App\Models\RequestActivity;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Total Requests
        $totalRequests = ClientRequest::count();
        
        // 2. New / Pending Requests
        $newRequests = ClientRequest::where('status', 'pending')->count();
        
        // 3. In Progress Requests
        $inProgressRequests = ClientRequest::where('status', 'in_progress')->count();
        
        // 4. Completed Requests
        $completedRequests = ClientRequest::where('status', 'completed')->count();
        
        // 5. Rejected Requests
        $rejectedRequests = ClientRequest::where('status', 'rejected')->count();

        // 6. Request by Priority
        $priorityOverview = [
            'low'    => ClientRequest::where('priority', 'low')->count(),
            'medium' => ClientRequest::where('priority', 'medium')->count(),
            'high'   => ClientRequest::where('priority', 'high')->count(),
            'urgent' => ClientRequest::where('priority', 'urgent')->count(),
        ];

        // 7. Recent Requests
        $recentRequests = ClientRequest::with(['client', 'assigned_user'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // 8. Recent Activities
        $recentActivities = RequestActivity::with(['user', 'request'])
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // 9. Total Clients (real count from DB)
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

