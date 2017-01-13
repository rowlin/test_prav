<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpModel;

class HelpController extends Controller
{
    public function searchUsers(Request $request) {
        $search = $request->search;

        $users = HelpModel::findUsers($search);

        return view('trainer.users.users', compact('users'));
    }
}