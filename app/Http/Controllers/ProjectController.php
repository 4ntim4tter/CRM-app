<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        return view('project-edit', compact('project'));
    }

    public function create()
    {
        return view('project-edit');
    }

}
