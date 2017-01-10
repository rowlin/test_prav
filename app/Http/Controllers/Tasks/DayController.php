<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DayController extends Controller
{
    public function showDay($num_month, $num_week, $num_day) {
        return view('tasks.day', compact('num_month', 'num_week', 'num_day'));
    }
}
