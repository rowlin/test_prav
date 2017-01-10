<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerModel extends Model
{
    static function validateTraining($training) {
        $result = [
            'result' => false,
            'display' => false
        ];

        if(!$training['heading']) {
            $result['display'] = 'Введите название тренировки';
            return $result;
        }
        if(!$training['shortDesc']) {
            $result['display'] = 'Введите краткое описание тренировки';
            return $result;
        }
        if(!$training['desc']) {
            $result['display'] = 'Введите полное описание тренировки';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }

    static function addTraining($training) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('trainings')
                ->insert([
                    'heading' => $training['heading'],
                    'short_desc' => $training['shortDesc'],
                    'description' => $training['desc']
                ]);
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $result['display'] = 'Такая тренировка уже была добавлена ранее';
                return $result;
            }
            else {
                $result['display'] = 'Не удалось добавить тренировку';
                return $result;
            }
        }

        $result['result'] = true;
        return $result;
    }

    static function redactTraining($training) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('trainings')
                ->where('id', $training['id'])
                ->update([
                    'heading' => $training['heading'],
                    'short_desc' => $training['shortDesc'],
                    'description' => $training['desc']
                ]);
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $result['display'] = 'Такая тренировка уже существует';
                return $result;
            }
            else {
                $result['display'] = 'Не удалось добавить тренировку';
                return $result;
            }
        }

        $result['result'] = true;

        return $result;
    }

    static function showAllTrainings() {
        $training = \DB::table('trainings')
            ->get();

        return $training;
    }

    static function showTraining($id) {
        $training = \DB::table('trainings')
            ->where('id', $id)
            ->first();

        return $training;
    }

    static function getAllUsers() {
        $users = \DB::select("select users.id, users.username,
                users.name, task_first.surname, users.phone, users.email
                from users join task_first on users.id=task_first.user_id");

        return $users;
    }

    static function getUser($id) {
        $user = \DB::select("select users.username, users.name, task_first.surname,
                users.phone, users.email, task_first.birthday,
                task_first.gender, task_first.country, task_first.city,
                task_second.date_change, task_second.weight, task_second.waist,
                task_second.hip, task_second.chest
                from users join task_first on users.id=task_first.user_id
                join task_second on users.id=task_second.user_id
                join task_third on users.id=task_third.user_id where users.id='".$id."'");

        return $user;
    }

    static function getUserFood($id) {
        $foodData = \DB::select("select users.name,
            task_first.surname,
            task_third.*,
            users.id
            from users join task_third on users.id=task_third.user_id
            join task_first on users.id=task_first.user_id
            where users.id='".$id."'
        ");

        $food = $foodData[0];

        return $food;
    }

    static function addFood($food) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('food')
                ->insert(
                    [
                        'user_id' => $food['id'],
                        'description' => $food['desc']
                    ]
                );
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $result['display'] = 'Такая анкета уже существует';
                return $result;
            }
            else {
                $result['display'] = 'Не удалось добавить анкету';
                return $result;
            }
        }

        $result['result'] = true;

        return $result;
    }

}