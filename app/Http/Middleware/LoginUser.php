<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class LoginUser {

    public function handle($request, Closure $next)
    {
        $userData = \Auth::user();

        if(\Auth::check()) {
           if($userData->code == 1) {
          //if($userData->is_admin == 1){
             //   return redirect('/me');
           redirect('/count');
            }
            return redirect('/count');
        }

        return $next($request);
    }
}
