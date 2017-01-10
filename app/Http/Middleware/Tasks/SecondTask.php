<?php

namespace App\Http\Middleware\Tasks;

use Closure;
use App\Models\TaskModel;

class SecondTask {

    public function handle($request, Closure $next)
    {
        $id = \Auth::id();
        $check_first = TaskModel::checkIfFirstTaskFull($id);
        if(!$check_first['result']) {
            return redirect('/tasks');
        }

        return $next($request);
    }
}
