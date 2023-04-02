<?php

namespace App\Http\Controllers;

use App\Models\Client;
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

    public function store(Request $request)
    {
        dd($request->all());
    }

}
