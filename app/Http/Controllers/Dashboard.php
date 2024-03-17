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
                        ->whereYear('created_at',date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->where('status','Paid')
                        ->get();
        $labels = [];
        $data = [];
        $colors = ['red','blue','yellow','green','orange','pink','black','white','cyan','brown','gray','purple'];

        for ($i=1; $i < 12; $i++){
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;

            foreach($users as $user){
                if($user->month == $i){
                    $count = $user->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label' => 'Orders',
                'data' => $data,
                'backgroundColor' => $colors
            ]
            ];

            return view('dashboard',compact('datasets','labels'));
    }
}
