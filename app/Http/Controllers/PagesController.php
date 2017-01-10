<?php

namespace App\Http\Controllers;

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
        return view('pages.food');
    }

    public function report() {
        $id = \Auth::id();

        $message = UserModel::getAllReports($id);

        return view('pages.report', compact('message'));
    }

    public function faq() {
        return view('pages.faq');
    }

    public function stressTest() {
        return view('pages.stressTest');
    }

    public function training() {
        return view('pages.training');
    }

    public function rating() {
        return view('pages.rating');
    }
}
