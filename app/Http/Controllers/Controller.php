<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Helpme\Helpme;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $count_users;

    public function __construct() {
        $global_user = [];
        $now_date = date('Y-m-d');
        $global_user['count'] = Helpme::getCountUsers() - 1;
        //$global_user['new_users'] = Helpme::getNewUsers($now_date);
        //$global_user['user'] = UserModel::getUserInfo($id);
        \View::share('global_user', $global_user);
    }
}
