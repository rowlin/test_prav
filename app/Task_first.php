<?php

namespace App;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

class Task_first extends Model
{
    protected  $fillable =[ 'user_id', 'username', 'surname', 'birthday', 'gender', 'country', 'avatar' ];
    protected  $table = "task_first";

    public function user(){
        $this->belongsTo('App\User');
    }

/*drop here */
    public function getGenderAttributes($value)
    {
        if($value == 0) return "woman";
        else if ($value == 1) return "man";
        else return 0;
    }

    public function setGenderAttributes($value){
        if($value == "woman") return 0;
        else if ($value == "man") return 1;
        else return 0;

    }


}

