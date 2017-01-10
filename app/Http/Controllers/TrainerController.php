<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\TrainerModel;

class TrainerController extends Controller
{
    public function index() {
        $id = \Auth::id();
        $userData = UserModel::getUserInfo($id);

        return view('trainer.profile', compact('userData', $userData));
    }

    public function trainings() {
        $training = TrainerModel::showAllTrainings();

        return view('trainer.trainings.trainings', compact('training'));
    }

    public function training($id) {
        $training = TrainerModel::showTraining($id);

        return view('trainer.trainings.training', compact('training'));
    }

    public function addTraining(Request $request) {
        $training = [];
        $training['heading'] = $request->heading;
        $training['shortDesc'] = $request->shortDesc;
        $training['desc'] = $request->desc;

        $validateTraining = TrainerModel::validateTraining($training);

        if(!$validateTraining['result']) {
            return \json_encode($validateTraining);
        }

        $addingTraining = TrainerModel::addTraining($training);

        return \json_encode($addingTraining);

    }

    public function redTraining(Request $request, $id) {
        $training = [];
        $training['id'] = $id;
        $training['heading'] = $request->heading;
        $training['shortDesc'] = $request->shortDesc;
        $training['desc'] = $request->desc;

        $validateTraining = TrainerModel::validateTraining($training);

        if(!$validateTraining['result']) {
            return \json_encode($validateTraining);
        }

        $addingTraining = TrainerModel::redactTraining($training);

        return \json_encode($addingTraining);

    }

    public function users() {
        $users = TrainerModel::getAllUsers();

        return view('trainer.users.users', compact('users'));
    }

    public function user($id) {
        $user = TrainerModel::getUser($id);

        $userData = $user[0];

        return view('trainer.users.user', compact('userData'));
    }

    public function food($id) {
        $food = TrainerModel::getUserFood($id);

        return view('trainer.food', compact('food'));
    }

    public function addFood(Request $request, $id) {
        $food = [];
        $food['desc'] = $request->desc;
        $food['id'] = $id;

        $addingFood = TrainerModel::addFood($food);

        return \json_encode($addingFood);
    }
}
