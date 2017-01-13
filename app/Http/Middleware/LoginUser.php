<?php

namespace App\Http\Middleware;

use Closure;

class LoginUser {

    public function handle($request, Closure $next)
    {
        $userData = \Auth::user();

        if(\Auth::check()) {
            if($userData->code == 1) {
                return redirect('/me');
            }
            if($userData->active == 1) {
                return redirect('/profile');
            }

        }

        return $next($request);
    }
}
