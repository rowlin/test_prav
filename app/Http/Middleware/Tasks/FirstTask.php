<?php

namespace App\Http\Middleware\Tasks;

use Closure;
use App\Models\TaskModel;

class FirstTask {

    public function handle($request, Closure $next)
    {
        $id = \Auth::id();
        $check_first = TaskModel::checkIfFirstTaskFull($id);
        if($check_first['result']) {
            return redirect('/profile');
        }

        return $next($request);
    }
}
