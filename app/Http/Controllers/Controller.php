<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $userData;

    public function __construct() {
        $this->userData = \Auth::user();
        $this->shareUserData();
    }

    function shareUserData() {
        \View::share(['userData' => $this->userData]);
    }
}
