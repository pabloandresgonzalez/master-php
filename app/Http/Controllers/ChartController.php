<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Prestamo;
use DB;

class ChartController extends Controller
{

    public function prestamos()
    {
        // created_at -> datetime
        $monthCounts =Prestamo::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(1) as count')
            )->groupBy('month')->get()->toArray();
        // [ ['month'=>?, 'count'=>? ]
        // [0,0,0,0,0..diciembre]

        $counts =array_fill(0, 12, 0); // que pisicion, cuantos, el valor
        foreach ($monthCounts as $monthCount) {
            $index = $monthCount['month']-1;
            $counts[$index] = $monthCount['count'];
        }

        //dd($counts);
    	return view('charts.prestamos', compact('counts'));
    }

    public function users()
    {
        return view('charts.users');
    }

    public function usersJson()
    {

        /*
        $doctors = User::get()->toArray();
        dd($doctors);*/

    }

}
