<?php

namespace App\Http\Controllers;

use App\Models\TrainerModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.frontPage');
    }

    public function welcome() {
        return view('pages.welcome');
    }

    public function food() {
        $id = \Auth::id();

        $food = UserModel::getFood($id);

        return view('pages.food', compact('food'));
    }

    public function report() {
        $id = \Auth::id();

        $message = UserModel::getAllReports($id);

        return view('pages.report', compact('message'));
    }

    public function faq() {
        $id = \Auth::id();
        $rules = [];
        $rules['rules'] = TrainerModel::getRules();
        $rules['questions'] = UserModel::getRules($id);

        return view('pages.faq', compact('rules'));
    }

    public function stressTest() {
        return view('pages.stressTest');
    }

    public function training() {
        $training = TrainerModel::showAllTrainings();

        return view('pages.training', compact('training'));
    }

    public function rating() {
        return view('pages.rating');
    }
}
