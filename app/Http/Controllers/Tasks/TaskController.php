<?php

namespace App\Http\Controllers\Tasks;

use App\Models\UserModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\TaskModel;
use App\Http\Controllers\Controller;

class TaskController extends Controller {

    public function showFirstTask() {
            return view('tasks.task1');
    }

    public function showSecondTask() {
        return view('tasks.task2');
    }

    public function showThirdTask() {
        return view('tasks.task3');
    }

    public function firstTask(Request $request) {
        $user = [];
        $user['name'] = $request->name;
        $user['surname'] = $request->surname;
        $user['phone'] = $request->phone;
        $user['birthday'] = $request->birthday;
        $user['gender'] = $request->gender;
        $user['country'] = $request->country;
        $user['city'] = $request->city;
        $user['email'] = $request->email;
        $user['username'] = $request->username;
    $user['password'] = $request->password;

        $validatedUser = TaskModel::validateFirstTask($user);

        if(!$validatedUser['result']) {
            return \json_encode($validatedUser);
        } else {
            $user = $validatedUser['user'];
        }

        $redactedUser = UserModel::firstTask($user);

        if(!$redactedUser['result']) {
            return \json_encode($redactedUser);
        } else {
            return \json_encode($redactedUser);
        }

    }

    public function secondTask(Request $request) {
        $user = [];
        $user['weight'] = $request->weight;
        $user['waist'] = $request->waist;
        $user['chest'] = $request->chest;
        $user['hip'] = $request->hip;

        $validatedUser = TaskModel::validateSecondTask($user);

        if(!$validatedUser['result']) {
            return \json_encode($validatedUser);
        }

        $redactedUser = UserModel::secondTask($user);

        return \json_encode($redactedUser);
    }

    public function thirdTask(Request $request) {
        $user = [];
        $user['weight'] = $request->weight;
        $user['length'] = $request->length;

        $validatedUser = TaskModel::validateThirdTask($user);

        if(!$validatedUser['result']) {
            return \json_encode($validatedUser);
        }

        $redactedUser = UserModel::thirdTask($user);

        return \json_encode($redactedUser);
    }

    public function checkFirstTask() {
        $id = \Auth::id();
        $query = TaskModel::checkIfFirstTaskFull($id);

        return \json_encode($query);
    }

    public function checkSecondTask() {
        $id = \Auth::id();
        $query = TaskModel::checkIfSecondTaskFull($id);

        return \json_encode($query);
    }

    public function checkThirdTask() {
        $id = \Auth::id();
        $query = TaskModel::checkIfThirdTaskFull($id);

        return \json_encode($query);
    }
}
