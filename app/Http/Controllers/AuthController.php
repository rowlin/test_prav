<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthModal;
use App\Http\Controllers\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function registerUser(Request $request) {
        $user = [];
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['phone'] = $request->phone;
        $user['code'] = $request->code;

        $validatedUser = AuthModal::validateUser($user);
        if(!$validatedUser['result']) {
            return \json_encode($validatedUser);
        }

        $user = $validatedUser['user'];

        $createdUser = AuthModal::createUser($user);

        if(!$createdUser['result']) {
            return \json_encode($createdUser);
        } else {
            $newUser = $createdUser['user'];
            return \json_encode(AuthModal::loginByEmail($newUser));
        }
    }

    public function loginUser(Request $request) {
        $user = [];
        $user['username'] = $request->username;
        $user['password'] = $request->password;

        $validatedUser = AuthModal::loginUser($user);

        if(\Auth::attempt(['username' => $user['username'], 'password' => $user['password']])) {
            return \json_encode($validatedUser);
        }
        else {
            return \json_encode($validatedUser);
        }

    }

    public function logout() {
        \Auth::logout();
        return redirect('/auth/login');
    }
}
