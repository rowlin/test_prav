<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_second extends Model
{
    protected  $table = "task_second";

    protected  $fillable =[ 'weight', 'waist', 'chest', 'hip', 'images' ];

    public function user(){
        $this->belongsTo('App\User');
    }
}
