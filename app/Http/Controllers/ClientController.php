<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function delete(Client $client)
    {
        $client->delete();
        return redirect()->route('clients')->with('status', 'Client Deleted.');
    }

    public function store(Request $request, Client $client)
    {
        $client->updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('clients')->with('status', 'Client stored.');
    }

    public function edit(Client $client)
    {
        return view('profile.edit', compact('client'));
    }
}
