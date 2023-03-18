<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function delete(Request $request, Client $client)
    {
        $client->where('id', $request->client)->delete();
        return redirect()->route('clients')->with('status', 'Client Deleted.');
    }
}
