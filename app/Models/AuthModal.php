<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpme\Helpme;

class AuthModal extends Model
{
    static function validateUser($user) {
        $result = [
            'result' => false,
            'display' => false
        ];

        if(strlen($user['name']) < 2 ) {
            $result['display'] = 'Имя слишком короткое';
            return $result;
        }
        if(!$user['name']) {
            $result['display'] = 'Введите имя';
            return $result;
        }
        if($res = preg_match('/[^А-Яа-яЁё]/u', $user['name'])) {
            $result['display'] = 'Имя должно состоять из русских букв';
            return $result;
        }
        if(!$user['email']) {
            $result['display'] = 'Введите e-mail';
            return $result;
        }
        if(!strpos($user['email'], '@') || strlen($user['email']) < 5) {
            $result['display'] = 'Введите корректный e-mail';
            return $result;
        }
        if(!$user['phone']) {
            $result['display'] = 'Введите телефон';
            return $result;
        }
        /*if(strlen($user['phone'] != 11)){
            $result['display'] = 'Введите корректный номер телефона';
            return $result;
        }*/

        $result['result'] = true;
        $result['user'] = $user;
        return $result;
    }

    static function createUser($user) {
        $result =[
            'display' => false,
            'result' => false
        ];
        $password = Helpme::generatePass(8);
        $user['password'] = \Hash::make($password);
        $user['remember_token'] =  csrf_token();
        try {
            $newUser = \DB::table('users')->insertGetId($user);
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $existing_user = \DB::table('users')
                    ->where('phone', $user['phone'])
                    ->orWhere('email', $user['email'])
                    ->first();
                if($existing_user) {
                    if($existing_user->phone == $user['phone']) {
                        $result['display'] = 'Пользователь с таким номером уже существует';
                    } else {
                        $result['display'] = 'Пользователь с таким емайлом уже существует';
                    }
                    return $result;
                }
            } else {
                $result['display'] = 'Не удалось добавить пользователя';
                return $result;
            }
        }
        if($newUser) {
            \DB::table('task_first')->insert(['user_id' => $newUser]);
            \DB::table('task_second')->insert(['user_id' => $newUser]);
            \DB::table('task_third')->insert(['user_id' => $newUser]);
            $user['password'] = $password;
            $result['result'] = true;
            $result['user'] = $user;
        } else {
            $result['display'] = 'Не удалось добавить пользователя';
        }
        return $result;
    }

    static function loginByEmail($user) {
        $result = [
            'result' => false,
            'display' => false,
            'user' => $user
        ];

        if(!\Auth::attempt(['email' => $user['email'], 'password' => $user['password']])) {
            $result['display'] = 'Не удалось войти в систему';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }

    static function loginUser($user) {
        $result =[
            'result' => false,
            'display' => false
        ];
        if (!$user['username']) {
            $result['display'] = 'Введите логин';
            return $result;
        }
        if (!$user['password']) {
            $result['display'] = 'Введите пароль';
            return $result;
        }
        if(!\Auth::attempt(['username' => $user['username'], 'password' => $user['password']])) {
            $result['display'] = 'Неправильный логин или пароль';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }


}
