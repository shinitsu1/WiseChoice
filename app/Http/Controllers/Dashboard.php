<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class Dashboard extends Controller
{
    //
    public function userChart()
    {
        $users = Orders::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->where('status', 'Paid')
            ->get();
        $labels = [];
        $data = [];
        $colors = ["#115f9a", "#1984c5", "#22a7f0", "#48b5c4", "#76c68f", "#a6d75b", "#c9e52f", "#d0ee11", "#d0f400"];

        for ($i = 1; $i < 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;

            foreach ($users as $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }

            array_push($labels, $month);
            array_push($data, $count);
        }

        $datasets = [
            [
                'label' => 'Orders',
                'data' => $data,
                'backgroundColor' => $colors
            ]
        ];



        $income = Orders::selectRaw('MONTH(created_at) as month, SUM(earnings) as total_earnings')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->where('status', 'Paid')
            ->get();
        $income_labels = [];
        $income_data = [];
        $income_colors = ["#fd7f6f", "#7eb0d5", "#b2e061", "#bd7ebe", "#ffb55a", "#ffee65", "#beb9db", "#fdcce5", "#8bd3c7"];

        foreach ($income as $inc) {
            $income_month = date('F', mktime(0, 0, 0, $inc->month, 1));
            $income_earnings = $inc->total_earnings;

            array_push($income_labels, $income_month);
            array_push($income_data, $income_earnings);
        }

        $income_datasets = [
            [
                'label' => 'Monthly Earnings',
                'data' => $income_data,
                'backgroundColor' => $income_colors
            ]
        ];

        return view('dashboard', compact('datasets', 'labels','income_datasets','income_labels'));
    }
}
