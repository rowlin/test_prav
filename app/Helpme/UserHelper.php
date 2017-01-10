<?php

namespace App\Helpme;

use Illuminate\Http\Request;
use App\User;

class UserHelper {

    static function getAvatar($user){
        $defaultAvatar = "/images/defaultAvatar.png";
        if(!$user->firstTask) {
            return $defaultAvatar;
        }
        return $user->firstTask->avatar;

    }

    static function getFullName($user/*$id*/){
        if(!$user->firstTask)
            return $user->username;
        $fullname =  $user->firstTask->username .' '. $user->firstTask->surname;
        return $fullname;
    }

}