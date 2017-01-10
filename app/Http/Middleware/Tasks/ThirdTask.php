<?php

namespace App\Http\Middleware\Tasks;

use Closure;
use App\Models\TaskModel;

class ThirdTask {

    public function handle($request, Closure $next)
    {
        $id = \Auth::id();
        $check_first = TaskModel::checkIfFirstTaskFull($id);
        $check_second = TaskModel::checkIfSecondTaskFull($id);
        if(!$check_first['result'] || !$check_first['result'] && !$check_second['result']) {
            return redirect('/tasks');
        }

        return $next($request);
    }
}
