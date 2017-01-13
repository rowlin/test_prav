<?php

namespace App\Helpme;

class Helpme {
    static function generatePass($length){
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    static function getCountUsers() {
        $count = \DB::table('users')
            ->count();

        return $count;
    }

    static function getNewUsers($date) {  //?????????
        $new_users = \DB::select("select * from users
          where DATE_FORMAT('%Y-%m-%d', registered_at)='".$date."'
        ");

        return $new_users;
    }
}