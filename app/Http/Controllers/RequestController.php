<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestModel;
use App\Models\Client;
use App\Models\Category;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function index(HttpRequest $request)
    {
        $search = $request->input('search');

        $requests = RequestModel::with(['client', 'category', 'creator', 'assignee'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {

                    // Cari berdasarkan request number
                    $q->where('request_number', 'like', "%{$search}%")

                        // Cari berdasarkan subject
                        ->orWhere('subject', 'like', "%{$search}%")

                        // Cari berdasarkan description
                        ->orWhere('description', 'like', "%{$search}%")

                        // Cari berdasarkan nama client
                        ->orWhereHas('client', function ($clientQuery) use ($search) {
                            $clientQuery->where('name', 'like', "%{$search}%");
                        })

                        // Cari berdasarkan nama category
                        ->orWhereHas('category', function ($categoryQuery) use ($search) {
                            $categoryQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('requests.index', compact('requests', 'search'));
    }

    public function myRequests(HttpRequest $request)
    {
        $search = $request->input('search');

        $requests = RequestModel::with(['client', 'category', 'creator', 'assignee'])
            ->where('created_by', auth()->id())
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {

                    $q->where('request_number', 'like', "%{$search}%")
                        ->orWhere('subject', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")

                        ->orWhereHas('client', function ($clientQuery) use ($search) {
                            $clientQuery->where('name', 'like', "%{$search}%");
                        })

                        ->orWhereHas('category', function ($categoryQuery) use ($search) {
                            $categoryQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('requests.my-requests', compact('requests', 'search'));
}

    public function create()
    {
        $clients = Client::where('status', 'active')
            ->orderBy('name')
            ->get();

        $categories = Category::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('requests.create', compact(
            'clients',
            'categories'
        ));
    }

    public function store(HttpRequest $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'category_id' => 'required|exists:categories,id',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high,urgent',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'due_date' => 'nullable|date',
        ]);

        $validated['request_number'] = 'REQ-' . date('YmdHis');
        $validated['created_by'] = auth()->id();

        RequestModel::create($validated);

        return redirect()
            ->route('requests.index')
            ->with('success', 'Request created successfully.');
    }

    public function edit(RequestModel $request)
    {
        $clients = Client::where('status', 'active')
            ->orderBy('name')
            ->get();

        $categories = Category::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('requests.edit', compact(
            'request',
            'clients',
            'categories'
        ));
    }

    public function update(HttpRequest $httpRequest, RequestModel $request)
    {
        $validated = $httpRequest->validate([
            'client_id' => 'required|exists:clients,id',
            'category_id' => 'required|exists:categories,id',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high,urgent',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'due_date' => 'nullable|date',
        ]);

        $request->update($validated);

        return redirect()
            ->route('requests.index')
            ->with('success', 'Request updated successfully.');
    }

    public function destroy(RequestModel $request)
    {
        $request->delete();

        return redirect()
            ->route('requests.index')
            ->with('success', 'Request deleted successfully.');
    }
    
}