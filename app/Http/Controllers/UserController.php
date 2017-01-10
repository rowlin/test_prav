<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('pages.user');
    }
    
    
    
    
    
    
    public function profile() {

        $id = \Auth::id();
        $userData = UserModel::getUserInfo($id);

        return view('user.profile', compact('userData', $userData));
    }

    public function editProfile(Request $request) {
        $user = [];
        $user['name'] = $request->name;
        $user['surname'] = $request->surname;
        $user['phone'] = $request->phone;
        $user['birthday'] = $request->birthday;
        $user['gender'] = $request->gender;
        $user['country'] = $request->country;
        $user['city'] = $request->city;
        $user['email'] = $request->email;

        $validatedUser = UserModel::validateUserInfo($user);

        if(!$validatedUser['result']) {
            return \json_encode($validatedUser);
        }

        $redactedUser = UserModel::redUserInfo($user);

        return \json_encode($redactedUser);
    }

    public function tasks() {
        $startDate = new \DateTime();
        $startDate->setDate(2017, 1, 10);
        $startDate->format('Y-m-d');

        $nowDate = date('Y-m-d');

        if($startDate->format('Y-m-d') <= $nowDate) {
            return view('user.tasksAfterStart');
        } else {
            return view('user.tasksPreStart');
        }
    }

    public function editReport(Request $request){
        $message = $request->message;

        $addReport = UserModel::addReport($message);

        return \json_encode($addReport);
    }

    public function editFaq(Request $request){
        $message = $request->message;

        $addQuest = UserModel::addQuest($message);

        return \json_encode($addQuest);
    }
}
