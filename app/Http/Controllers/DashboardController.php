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
            'chart_title' => 'Users by name',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\User',
            'group_by_field' => 'name',
            'chart_type' => 'line',
            'chart_color' => '255,255,255'
        ];
        $chart = new LaravelChart($chart_stats);

        return view('dashboard', compact('chart', 'clients'));
    }

    public function clients(Request $request, Client $clients)
    {
        $clients = Client::first()->paginate(10);
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
