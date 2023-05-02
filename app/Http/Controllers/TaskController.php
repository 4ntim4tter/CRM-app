<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function project_tasks($project)
    {
        $projects = auth()->user()->project;
        $tasks = Project::where('id', $project)->first()->tasks;
        return view('tasks', compact('tasks', 'projects'));
    }
}
