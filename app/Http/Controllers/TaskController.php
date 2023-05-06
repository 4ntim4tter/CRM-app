<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Logging;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function project_tasks($project)
    {
        $projects = auth()->user()->project;
        $selected_project = Project::where('id', $project)->first();
        $tasks = $selected_project->tasks;
        return view('tasks', compact('tasks', 'projects', 'selected_project'));
    }

    public function store(Request $request, Task $task, Logging $log)
    {
        if ($task->where('id', '=', $request->id)->exists()) {
            $log->create([
                'name' => auth()->user()->name,
                'log' => 'Task for projectID ' . $request->project . " named " . $request->name . ' updated.'
            ]);
        } else {
            $log->create([
                'name' => auth()->user()->name,
                'log' => 'Task for projectID ' . $request->project . " named " . $request->name . ' created.'
            ]);
        }
        $task->updateOrCreate(
            ['id' => $request->id,],
            [
                'name' => $request->name,
                'description' => $request->description,
                'assigned_client' => $request->assigned_client,
                'assigned_user' => $request->assigned_user,
                'deadline' => date('d-m-Y h:m', strtotime($request->deadline)),
                'project_id' => $request->project,
                'status' => ($request->status === "on") ? 1 : 0,
            ]
        );

        return redirect()->route('tasks.project', $request->project)->with('status', 'Task stored.');
    }

    public function edit($id)
    {
        $selected_task = Task::where('id', $id)->first();
        $projects = auth()->user()->project;
        $selected_project = Project::where('id', $selected_task->project_id)->first();
        $tasks = $selected_project->tasks;
        return view('tasks', compact('tasks', 'projects', 'selected_project', 'selected_task'));
    }

    public function delete($task, Logging $log)
    {
        $task = Task::where('id', $task)->first();
        $log->create([
            'name' => auth()->user()->name,
            'log' => 'Task for named ' . $task->name . ', moved to trash.'
        ]);
        $selected_project = Project::where('id', $task->project_id)->first();
        $task->delete();

        return $this->project_tasks($selected_project->id);
    }
}
// "name" => "qweqwe"
// "description" => "qweqweqwe"
// "assigned_client" => "Reilly-Turner"
// "assigned_user" => "Anita Yost"
// "deadline" => "2023-05-19T18:02"
// "project" => "113"
// "status" => "on"