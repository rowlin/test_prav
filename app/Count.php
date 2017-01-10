<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected  $fillable =[ "many","transaction" ];
    protected  $table = "count";
    
    
    public function users(){
        return $this->belongsTo('App\User');
    }
    

}
