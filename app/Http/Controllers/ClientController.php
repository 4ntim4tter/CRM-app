<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Logging;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function delete(Client $client, Logging $log)
    {
        $log->create([
            'name' => auth()->user()->name,
            'log' => 'Client ' . $client->name . ' deleted.']);
        $client->delete();
        return redirect()->route('clients')->with('status', 'Client Deleted.');
    }

    public function destroy($id, Logging $log)
    {
        $client = Client::onlyTrashed()->where('id', $id)->first();
        $log->create([
            'name' => auth()->user()->name,
            'log' => 'Client ' . $client->name . ' deleted permanently.'
        ]);
        $client->forceDelete();
        return redirect()->route('client.trashed')->with('status', 'Client deleted permanently.');
    }

    public function trashed(Client $client)
    {
        $clients = $client->onlyTrashed()->latest()->paginate(10);
        return view('clients', compact('clients'));
    }

    public function store(Request $request, Client $client, Logging $log)
    {
        if ($client->where('id', '=', $request->id)->exists()){
            $log->create([
                'name' => auth()->user()->name,
                'log' => 'Client ' . $request->name . ' updated.']);
        } else {
            $log->create([
                'name' => auth()->user()->name,
                'log' => 'Client ' . $request->name . ' created.']);
        }
        $client->updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('clients')->with('status', 'Client stored.');
    }

    public function create()
    {
        return view('client-edit');
    }

    public function edit(Client $client)
    {
        return view('client-edit', compact('client'));
    }
}
