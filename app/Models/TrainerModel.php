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
                    'description' => $training['desc'],
                    'date_start' => $training['date_start'],
                    'date_end' => $training['date_end']
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
                    'description' => $training['desc'],
                    'date_start' => $training['date_start'],
                    'date_end' => $training['date_end']
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
        $users = \DB::select("select users.id, users.username, users.active, users.pay,
                users.name, task_first.surname, users.phone, users.email, users.code
                from users join task_first on users.id=task_first.user_id


                ");



        //dd($users);

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

    static function getAllFood() {
        $food = \DB::select("select food.*,
            users.name, users.id,
            task_first.surname
            from food
            join users on users.id=food.user_id
            join task_first on users.id=task_first.user_id
        ");

        return $food;
    }

    static function getUserFood($id) {
        $foodData = \DB::select("select food.*,
            users.name,
            task_first.surname,
            task_third.*,
            users.id
            from users join task_third on users.id=task_third.user_id
            join task_first on users.id=task_first.user_id
            join food on users.id=food.user_id
            where users.id='".$id."'
        ");

        if($foodData) {
            $food = $foodData[0];
            return $food;
        }

        return $foodData;
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

    static function getAllStressTests() {
        $stress_tests = \DB::table('stress_tests')
            ->get();

        return $stress_tests;
    }

    static function getStressTest($id) {
        $stress_test = \DB::table('stress_tests')
            ->where('id', $id)
            ->first();

        return $stress_test;
    }

    static function addTest($test) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('stress_tests')
                ->insert([
                    'heading' => $test['heading'],
                    'short_desc' => $test['shortDesc'],
                    'description' => $test['desc'],
                    'date_start' => $test['date_start']
                ]);
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $result['display'] = 'Такой стресс-тест уже был добавлен ранее';
                return $result;
            }
            else {
                $result['display'] = 'Не удалось добавить стресс-тест';
                return $result;
            }
        }

        $result['result'] = true;
        return $result;
    }

    static function redactTest($test) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('stress_tests')
                ->where('id', $test['id'])
                ->update([
                    'heading' => $test['heading'],
                    'short_desc' => $test['shortDesc'],
                    'description' => $test['desc'],
                    'date_start' => $test['date_start']
                ]);
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $result['display'] = 'Такой стресс-тест уже существует';
                return $result;
            }
            else {
                $result['display'] = 'Не удалось добавить стресс-тест';
                return $result;
            }
        }

        $result['result'] = true;

        return $result;
    }

    static function getQuestions() {
        $faq = \DB::table('questions')
            ->get();

        return $faq;
    }

    static function getFaqQuestion($id) {
        $question = \DB::select("select questions.id as question_id, questions.user_id,
            questions.message as question_message,
            answers.id as answer_id, answers.message as answer_message
            from questions left join answers on questions.id=answers.question_id
            where questions.id='".$id."'");

        return $question[0];
    }

    static function addAnswer($answer) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('answers')
                ->insert([
                    'question_id' => $answer['id'],
                    'user_id' => $answer['user_id'],
                    'message' => $answer['desc']
                ]);
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $result['display'] = 'Ответ на вопрос уже был добавлен ранее';
                return $result;
            }
            else {
                $result['display'] = 'Не удалось добавить ответ';
                return $result;
            }
        }

        $result['result'] = true;
        return $result;
    }

    static function editAnswer($answer) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('answers')
                ->where('question_id', $answer['id'])
                ->update([
                    'message' => $answer['desc']
                ]);
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $result['display'] = 'Ответ на вопрос уже был добавлен ранее';
                return $result;
            }
            else {
                $result['display'] = 'Не удалось добавить ответ';
                return $result;
            }
        }

        $result['result'] = true;
        return $result;
    }

    static function getAllReports($id) {
        $report = \DB::table('reports')
            ->where('user_id', $id)
            ->get();

        return $report;
    }

    static function getReport($id, $report_id) {
        $report = \DB::table('reports')
            ->where('user_id', $id)
            ->where('id', $report_id)
            ->first();

        $report = \DB::select("select reports.id as report_id, reports.user_id, reports.message as report_message,
            reports.answer, answer_report.id as answer_id, answer_report.message as answer_message
            from reports left join answer_report on reports.id=answer_report.report_id
            where reports.id='".$report_id."' and reports.user_id='".$id."'
         ");

        return $report[0];
    }

    static function addAnswerReport($answer) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('answer_report')
                ->insert([
                    'user_id' => $answer['user_id'],
                    'report_id' => $answer['report_id'],
                    'message' => $answer['msg'],
                    'mark' => $answer['mark']
                ]);
        } catch(\Exception $e) {
            if($e->getCode() == 23000) {
                $result['display'] = 'Такой отчет уже существует';
                return $result;
            }
            else {
                $result['display'] = 'Не удалось добавить отчет';
                return $result;
            }
        }

        try {
            \DB::table('reports')
                ->where('id', $answer['report_id'])
                ->update([
                    'answer' => 2
                ]);
        } catch(\Exception $e) {
            $result['display'] = 'Не удалось обновить статус отчета';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }

    static function openUserAccess($id) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('users')
                ->where('id', $id)
                ->update(['active' => 1]);
        } catch(\Exception $e) {
            $result['display'] = 'Не удалось открыть доступ';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }

    static function closeUserAccess($id) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('users')
                ->where('id', $id)
                ->update(['active' => 2]);
        } catch(\Exception $e) {
            $result['display'] = 'Не удалось открыть доступ';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }

    static function getRules() {
        $rules = \DB::table('rules')
            ->get();

        return $rules;
    }

    static function editRules($message) {
        $result = [
            'result' => false,
            'display' => false
        ];

        try {
            \DB::table('rules')
                ->where('id', 1)
                ->update(['description' => $message]);
        } catch(\Exception $e) {
            $result['display'] = 'Не удалось редактировать правила';
            return $result;
        }

        $result['result'] = true;
        return $result;
    }

}
