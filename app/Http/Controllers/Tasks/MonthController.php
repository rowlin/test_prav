<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonthController extends Controller
{
    public function showMonth($num_month) {
        return view('tasks.month', compact('num_month', $num_month));
    }
}
