<?php

namespace App\Http\Middleware\Tasks;

use Closure;
use App\Models\TaskModel;

class AllTasks {

    public function handle($request, Closure $next)
    {
        $id = \Auth::id();
        $check = TaskModel::checkIfAllTasksFull($id);

        if(!$check['result']) {
            return redirect('/tasks');
        }

        return $next($request);
    }
}
