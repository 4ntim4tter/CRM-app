<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index(Request $request, Client $clients)
    {
        $clients = Client::all();
        $chart_stats = [
            'chart_title' => 'Users by date',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Client',
            'group_by_field' => 'created_at',
            'chart_type' => 'bar',
            'chart_color' => '255,255,255'
        ];
        $chart = new LaravelChart($chart_stats);

        return view('dashboard', compact('chart', 'clients'));
    }

    public function clients(Request $request, Client $clients)
    {
        $clients = Client::latest()->paginate(10);
        return view('clients', compact('clients'));
    }

    public function projects(Request $request)
    {
        return view('projects');
    }

    public function tasks(Request $request)
    {
        return view('tasks');
    }

}
