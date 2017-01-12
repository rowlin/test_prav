<?php

namespace App\Http\Controllers;
use App\Http\Middleware\Tasks\FirstTask;
use App\Task_second;
use Illuminate\Support\Facades\Redirect;
use App\Task_first;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    public function first_task(){
        return view('count.firstTask');
    }


    public function safe_first_task(Request $request){

        $rules = [
            'username' => 'required|min:2',
            'surname' => 'required',
            'birthday' => 'required',
            'gender' =>'required',
            'country'=>'required',
            'city' => 'required',
            'image' => 'required|image|max:2048',
        ];

        $messages =[
            'required' => 'Введите имя пользователя',
            'surname.required' => 'Введите фамилию',
            'birthday.required' => 'Введите день рождения',
            'country.required' => 'Введите страну',
            'city.required' => 'Введите город',
           /* 'user_id.required' => 'Вы должны быть авторизованы',*/
        ];

        $this->validate($request, $rules, $messages);

         $first_step = new Task_first;
         $first_step->user_id = Auth::id();
         $first_step->username = $request->username;
         $first_step->surname = $request->surname;
         $first_step->birthday = $request->birthday;
         $first_step->gender = $request->gender;
         $first_step->country = $request->coutry;
         $first_step->city = $request->city;

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $random_name = str_random(8);
            $destinationPath = 'uploads/'. Auth::id()  ;
            $extension = $file->getClientOriginalExtension();
            $filename=$random_name.'_link_logo.'.$extension;
            Input::file('image')->move($destinationPath, $filename);
        } else {
            return Redirect::back()->withErrors("Не удалось загрузить файл");
        }

         $first_step->avatar = $destinationPath ."/". $filename;
           Task_first::create($first_step);
         Session::flash('flash_message', 'Задание выполнено!');
    }

    public function second_task(){
        return view('count.secondTask');
    }

    public function safe_second_task(Request $request){


    }


    public function third_task(){
        return view('count.thirdTask');
    }


    public function safe_third_task(Request $request){
        $rules = [
            'weight' => 'required|min:30',//вес
            'chest' => 'required|max:10',// Грудь ?
            'hip' => 'required',//таз
            'images' => 'required|image|max:2048',
        ];

        $messages =[
            'required.weight' => 'Введите реальное значение ',
            'surname.chest' => 'Введите реальное значение',
            'hip.required' => 'Введите размер таза',
            /* 'user_id.required' => 'Вы должны быть авторизованы',*/
        ];

        $this->validate($request, $rules, $messages);

        $second_step = new Task_second;
        $second_step->user_id = Auth::id();
        $second_step->weight = $request->weight;
        $second_step->chest = $request->chest;
        $second_step->hip = $request->hip;



        $second_step->images = sss;

        Task_first::create($second_step);
        Session::flash('flash_message', 'Задание выполнено!');


    }





}
