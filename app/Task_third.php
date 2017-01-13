<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_third extends Model
{
    protected  $table = "task_third";

    /*так мы обращаемся с пользователем*/
    public function user(){
        $this->belongsTo('App\User');
    }

}