<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    public function user(){
          return $this->hasOne('App\User');
    }








    static function validateFirstTask($user) {
        $result = [
            'result' => false,
            'display' => false
        ];

        if(strlen($user['name']) < 2) {
            $result['display'] = 'Имя пользователя слишком короткое';
            return $result;
        }
        if(!$user['name']) {
            $result['display'] = 'Введите имя';
            return $result;
        }
        if(!$user['surname']) {
            $result['display'] = 'Введите фамилию';
            return $result;
        }
        if(!$user['phone']) {
            $result['display'] = 'Введите телефон';
            return $result;
        }
        /*if(!is_int($user['phone'])) {
            $result['display'] = 'Введенный номер телефона должен состоять из цифр';
            return $result;
        }*/
        if(!$user['birthday']) {
            $result['display'] = 'Введите дату рождения';
            return $result;
        }
        if(!isset($user['gender'])) {
            $result['display'] = 'Выберите пол';
            return $result;
        }
        if(!$user['country']) {
            $result['display'] = 'Введите страну';
            return $result;
        }
        if(!$user['city']) {
            $result['display'] = 'Введите город';
            return $result;
        }
        if(!$user['email']) {
            $result['display'] = 'Введите e-mail';
            return $result;
        }
        if(!$user['username']) {
            $result['display'] = 'Введите логин';
            return $result;
        }
        if(!$user['password']) {
            $result['display'] = 'Введите пароль';
            return $result;
        }
        if(strlen($user['password']) < 6) {
            $result['display'] = 'Слишком короткий пароль. Введите не менее 6 символов';
            return $result;
        }

        if($user['gender'] == 'male') {
            $user['gender'] = 1;
        } elseif($user['gender'] == 'female'){
            $user['gender'] = 2;
        }

        $result['result'] = true;
        $result['user'] = $user;
        return $result;
    }

    static function validateSecondTask($user) {
        $result = [
            'result' => false,
            'display' => false
        ];

        if(!$user['weight']) {
            $result['display'] = 'Введите вес';
            return $result;
        }
        if(!$user['waist']) {
            $result['display'] = 'Введите объем талии';
            return $result;
        }
        if(!$user['chest']) {
            $result['display'] = 'Введите объем груди';
            return $result;
        }
        if(!$user['hip']) {
            $result['display'] = 'Введите объем бедра';
            return $result;
        }
        if(is_int($user['weight'])) {
            $result['display'] = 'Введенное значение должно быть числовым';
            return $result;
        }
        if(is_int($user['waist'])) {
            $result['display'] = 'Введенное значение должно быть числовым';
            return $result;
        }
        if(is_int($user['chest'])) {
            $result['display'] = 'Введенное значение должно быть числовым';
            return $result;
        }
        if(is_int($user['hip'])) {
            $result['display'] = 'Введенное значение должно быть числовым';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }

    static function validateThirdTask($user) {
        $result = [
            'result' => false,
            'display' => false
        ];

        if(!$user['weight']) {
            $result['display'] = 'Введите вес';
            return $result;
        }
        if(!$user['length']) {
            $result['display'] = 'Введите рост';
            return $result;
        }
        if(is_int($user['weight'])) {
            $result['display'] = 'Введенное значение должно быть числовым';
            return $result;
        }
        if(is_int($user['length'])) {
            $result['display'] = 'Введенное значение должно быть числовым';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }

    static function checkIfFirstTaskFull($id) {
        $result = [
            'result' => false,
            'display' => false
        ];
        $query = \DB::table('task_first')
            ->where('user_id', $id)
            ->first();

        if(!$query->username) {
            $result['display'] = 'Поле "логин" не заполнено';
            return $result;
        }
        if(!$query->surname) {
            $result['display'] = 'Поле "фамилия" не заполнено';
            return $result;
        }
        if(!$query->birthday) {
            $result['display'] = 'Поле "день рождения" не заполнено';
            return $result;
        }
        /*if(!$query->gender) { // Исправить что = 0
            $result['display'] = 'Поле "пол" не заполнено';
            return $result;
        }*/
        if(!$query->country) {
            $result['display'] = 'Поле "страна" не заполнено';
            return $result;
        }
        if(!$query->city) {
            $result['display'] = 'Поле "город" не заполнено';
            return $result;
        }
        //Дописать про фотку
        /*if(!$query->avatar) {
            $result['display'] = 'Поле "фото" не заполнено';
            return $result;
        }*/
        $result['result'] = true;
        return $result;
    }

    static function checkIfSecondTaskFull($id) {
        $result = [
            'result' => false,
            'display' => false
        ];
        $query = \DB::table('task_second')
            ->where('user_id', $id)
            ->first();

        if(!$query->weight) {
            $result['display'] = 'Поле "логин" не заполнено';
            return $result;
        }
        if(!$query->waist) {
            $result['display'] = 'Поле "фамилия" не заполнено';
            return $result;
        }
        if(!$query->chest) {
            $result['display'] = 'Поле "день рождения" не заполнено';
            return $result;
        }
        if(!$query->hip) {
            $result['display'] = 'Поле "страна" не заполнено';
            return $result;
        }
        //Дописать про фотку
        /*if(!$query->avatar) {
            $result['display'] = 'Поле "фото" не заполнено';
            return $result;
        }*/
        $result['result'] = true;
        return $result;
    }

    static function checkIfThirdTaskFull($id) {
        $result = [
            'result' => false,
            'display' => false
        ];
        $query = \DB::table('task_third')
            ->where('user_id', $id)
            ->first();

        if(!$query->weight) {
            $result['display'] = 'Поле "логин" не заполнено';
            return $result;
        }
        if(!$query->length) {
            $result['display'] = 'Поле "фамилия" не заполнено';
            return $result;
        }
        $result['result'] = true;
        return $result;
    }

    static function checkIfAllTasksFull($id) {
        $result = [
            'result' => false,
            'display' => false
        ];
        $res1 = TaskModel::checkIfFirstTaskFull($id);

        $res2 = TaskModel::checkIfSecondTaskFull($id);

        $res3 = TaskModel::checkIfThirdTaskFull($id);

        if ($res1['result'] && $res2['result'] && $res3['result']) {
            $result['result'] = true;
            return $result;
    }

        $result['display'] = 'Не все задания выполнены';

        return $result;
    }
}
