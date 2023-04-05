<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Logging;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->route('projects')->with('status', 'Project Deleted.');
    }

    public function edit(Project $project)
    {
        $client_names = Client::pluck('name')->all();
        $user_names = User::pluck('name')->all();
        return view('project-edit', compact('project', 'client_names', 'user_names'));
    }

    public function create()
    {
        $client_names = Client::pluck('name')->all();
        $user_names = User::pluck('name')->all();
        return view('project-edit', compact('client_names', 'user_names'));
    }

    public function store(Request $request, Project $project, Client $client, Logging $log)
    {
        if ($project->where('id', '=', $request->id)->exists()){
            $log->create([
                'name' => auth()->user()->name,
                'log' => 'Project ' . $request->name . ' updated.']);
        } else {
            $log->create([
                'name' => auth()->user()->name,
                'log' => 'Project ' . $request->name . ' created.']);
        }
        $client = $client->where('name', '=', $request->client)->get();
        $project->updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'client_name' => $request->client,
                'description' => $request->description,
                'user_name' => $request->user,
                'status' => 1,
                'client_id' => $client[0]->id,
                'deadline' => date('Y-m-d', strtotime('+14 days'))
            ]
        );

        return redirect()->route('projects')->with('status', 'Project stored.');
    }
}
