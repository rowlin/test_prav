<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpme\ImageModule;

class TestController extends Controller
{

    public function showTest() {
        return view('pages.test');
    }
    public function test(Request $request) {
        $a = new ImageModule();
        $b = $a->uploadImage($request);
        return $b;
    }
}
