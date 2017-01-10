<?php

namespace App\Http\Middleware;

use Closure;

class AuthUser {

    public function handle($request, Closure $next)
    {
        if(\Auth::check()) {
            return redirect('/welcome');
        }

        return $next($request);
    }
}
