<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeekController extends Controller
{
    public function showWeek($num_month, $num_week) {
        return view('tasks.week', compact('num_month', $num_month, 'num_week', $num_week));
    }
}
