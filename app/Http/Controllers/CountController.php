<?php

namespace App\Http\Controllers;

use App\Task_first;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountController extends Controller
{


    public function getStatus(){
        $first =  User::max('pay')->first();
    }

    
    public function index(){
     $userData = \Auth::user();
        


        /*
        $status = 0;
        if($userData->code == 1){
         $msg ="админ";
         $status = 1;
        }elseif($userData->code == 0){
            $msg="RegUser";
        }else $msg= "User";
        */

        $allUser = User::where('pay', '>' , 500)
            ->orderBy('pay', 'desc')
            ->get(); // получает мользователей , на чем счету есть минимальное число
        
        return view('pages.rating', compact("allUser"));
    }

    public function test_first_task(){
        $task = User::find(1)->first();
        

    }


    public function edit(){
        
    }
    
    public function create_new_count(){
        
    }
    
    public function delete(){
        
    }
    
    
    
    



}
