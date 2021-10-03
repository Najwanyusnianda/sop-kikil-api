<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class DashboardController extends Controller
{
    //
    public function getCurrentMonth(){
        Carbon::setLocale(config('app.locale'));

        $date = Carbon::now();
        $current_month_name = $date->format('F');
        $current_month_number = (int) $date->format('m');

        return response()->json([
            "name"=>$current_month_name,
            "value"=>$current_month_number
        ], 200);
    }
}
