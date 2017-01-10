<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_first extends Model
{
    protected  $fillable =[ 'username', 'surname', 'birthday', 'gender', 'country', 'avatar' ];
    protected  $table = "task_first";

    public function user(){
        $this->belongsTo('App\User');
        
    }

}
