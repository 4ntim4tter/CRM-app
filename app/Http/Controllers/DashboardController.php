<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $chart_stats = [
            'chart_title' => 'Users by name',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\User',
            'group_by_field' => 'name',
            'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_stats);

        return view('dashboard', compact('chart'));
    }


}
