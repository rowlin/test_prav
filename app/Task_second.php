<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_second extends Model
{
    protected  $table = "task_second";

    protected  $fillable =[ 'weight', 'wais', 'chest', 'hip', 'images' ];

    public function user(){
        $this->hasOne('App\User');
    }
}
