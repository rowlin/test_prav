<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpModel extends Model
{
    static function findUsers($search) {
        $users = \DB::select("select users.id, users.username, users.active, users.pay,
                users.name, task_first.surname, users.phone, users.email, users.code
                from users join task_first on users.id=task_first.user_id
                where users.name like '%".$search."%' or
                task_first.surname like '%".$search."%' or
                users.pay='".$search."'");

        return $users;
    }
}