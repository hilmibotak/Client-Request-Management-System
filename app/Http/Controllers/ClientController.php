<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $clients = Client::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('kode_client', 'like', "%{$search}%")
                        ->orWhere('nama_client', 'like', "%{$search}%")
                        ->orWhere('nama_perusahaan', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('no_telepon', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('clients.index', compact('clients', 'search'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_client' => 'required|string|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:clients,email',
            'no_telepon' => 'nullable|string|max:30',
            'alamat' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        // Generate kode client otomatis
        $lastClient = Client::latest('id')->first();

        $nextNumber = $lastClient
            ? $lastClient->id + 1
            : 1;

        $validated['kode_client'] =
            'CL-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        Client::create($validated);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client berhasil ditambahkan.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nama_client' => 'required|string|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:clients,email,' . $client->id,
            'no_telepon' => 'nullable|string|max:30',
            'alamat' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $client->update($validated);

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Client berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client berhasil dihapus.');
    }
}