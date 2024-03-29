<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Logging;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index(Request $request, Client $clients)
    {
        $clients = Client::all();
        $logs = Logging::latest()->get();
        $chart_stats = [
            'chart_title' => 'Users by date',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Client',
            'group_by_field' => 'day_created',
            'chart_type' => 'bar',
            'chart_color' => '255,255,255'
        ];
        $chart = new LaravelChart($chart_stats);

        return view('dashboard', compact('chart', 'clients', 'logs'));
    }

    public function clients(Request $request, Client $clients)
    {
        $clients = Client::latest()->paginate(10);
        return view('clients', compact('clients'));
    }

    public function projects(Request $request, Project $projects)
    {
        $projects = $projects->latest()->paginate(10);
        return view('projects', compact('projects'));
    }

    public function tasks()
    {
        $projects = auth()->user()->project;
        $tasks = [];
        return view('tasks', compact('projects', 'tasks'));
    }

}
