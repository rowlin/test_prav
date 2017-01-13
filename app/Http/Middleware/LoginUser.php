<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class LoginUser {

    public function handle($request, Closure $next)
    {
        $userData = \Auth::user();

        if(\Auth::check()) {
            //не работатфет 
           if($userData->code == 1) {
          //if($userData->is_admin == 1){
             //   return redirect('/me');
           redirect('/me');
            }
               return redirect('/training');
        }

        return $next($request);
    }
}
