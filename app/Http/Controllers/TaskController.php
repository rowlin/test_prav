<?php

namespace App\Http\Controllers;
use App\Http\Middleware\Tasks\FirstTask;
use App\Task_first;
use App\Task_second;
use App\Task_third;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Session;

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
            'username.required' => 'Введите имя пользователя',
            'surname.required' => 'Введите фамилию',
            'birthday.required' => 'Введите день рождения',
            'country.required' => 'Введите страну',
            'city.required' => 'Введите город',
           /* 'user_id.required' => 'Вы должны быть авторизованы',*/
        ];

        $this->validate($request, $rules, $messages);
         $id = Auth::id();
         $first_step = new Task_first;
         $first_step->user_id = $id;
         $first_step->username = $request->username;
         $first_step->surname = $request->surname;
         $first_step->birthday = $request->birthday;
         $first_step->gender = $request->gender;
         $first_step->country = $request->country;
         $first_step->city = $request->city;

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $random_name = str_random(8);
            $destinationPath = 'uploads/'. $id  ;
            $extension = $file->getClientOriginalExtension();
            $filename= $id.'_avatar.'.$extension;
            Input::file('image')->move($destinationPath, $filename);
        } else {
            
            return redirect()->back()->with('message', "Не удалось загрузить файл");
        }

         $first_step->avatar = $destinationPath ."/". $filename;
         $first_step->save();
         Session::flash('flash_message', 'Задание выполнено!');
        return redirect()->route('цуи')->with('message','Тикет создан');
    }

    public function second_task(){
        return view('count.secondTask');
    }

    public function safe_second_task(Request $request){

        $rules = [
            'weight' => 'required',//вес
            'waist' =>'required', //талия
            'chest' => 'required',// Грудь ?
            'hip' => 'required',//таз
            'image1'=> 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required',
        ];

        $messages =[
            'waist.required' => ' В вас не реальная талия ))',
            'weight.required' => 'Введите реальное значение ',
            'chest.required' => 'Введите реальное значение',
            'hip.required' => 'Введите размер таза',
        ];

        $this->validate($request, $rules, $messages);
        $id = Auth::id();
        $second_step = new Task_second;
        $second_step->waist = $request->waist;
        $second_step->user_id = $id;
        $second_step->weight = $request->weight;
        $second_step->chest = $request->chest;
        $second_step->hip = $request->hip;

        $files[] = (Input::file('image1'));
        $files[] = (Input::file('image2'));
        $files[] = (Input::file('image3'));
        $files[] = (Input::file('image4'));

        $uploadcount = 0;
        foreach ($files as $file){
            $destinationPath = 'uploads' . $id;
            $filename = $file->getClientOriginalName();
            $images_path[$uploadcount++] = $destinationPath .'/' .$filename;
            $file->move($destinationPath, $filename);
        }

           $second_step->images = json_encode($images_path);

        $second_step->save();
        Session::flash('flash_message', 'Задание выполнено!');
        return redirect()->route('user_profile')->with('message','Тикет создан');
    }


    public function third_task(){
        return view('count.thirdTask');
    }


    public function safe_third_task(Request $request){

        $rules = [
            'weight' => 'required',//вес
            'length' => 'required',//
        ];

        $messages =[
            'weight.required' => 'Введите реальное значение ',
            'length.required' => 'Введите реальное значение',
        ];

        $this->validate($request, $rules, $messages);

        $third_step = new Task_Third;
        $id = Auth::id();
        $third_step->user_id = $id;
        $third_step->weight = $request->weight;
        $third_step->length = $request->length;
        $third_step->save();
        Session::flash('flash_message', 'Задание выполнено!');
        return redirect()->route('user_profile')->with('message','Тикет создан');
        }
}
