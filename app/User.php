<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone',  'pay', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','code'
    ];
    
    /*
     *  Определяем  задания , 
     *  которые выполнеят пользователь 
     *

    public function firstTask(){
        $this->belongsTo('App\Task_first');
    }

    */

    public function firstTask(){
       return $this->hasOne('App\Task_first');
    }

    public  function secondTask(){
        return $this->hasOne('App\Task_second');
    }

    public function thirdTask(){
        return $this->hasOne('App\Task_third');
    }

    public function is_Admin(){
         return $this->code;
    }
    
    
    

}
