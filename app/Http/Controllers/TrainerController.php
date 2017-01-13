<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\TrainerModel;

class TrainerController extends Controller
{
    public function index() {
        $id = \Auth::id();
        $userData = UserModel::getUserInfo($id);

        return view('trainer.profile', compact('userData', $userData));
    }

    public function trainings() {
        $training = TrainerModel::showAllTrainings();

        return view('trainer.trainings.trainings', compact('training'));
    }

    public function training($id) {
        $training = TrainerModel::showTraining($id);

        return view('trainer.trainings.training', compact('training'));
    }

    public function addTraining(Request $request) {
        $training = [];
        $training['heading'] = $request->heading;
        $training['shortDesc'] = $request->shortDesc;
        $training['desc'] = $request->desc;
        $training['date_start'] = $request->date_start;
        $training['date_end'] = $request->date_end;

        $validateTraining = TrainerModel::validateTraining($training);

        if(!$validateTraining['result']) {
            return \json_encode($validateTraining);
        }

        $addingTraining = TrainerModel::addTraining($training);

        return \json_encode($addingTraining);

    }

    public function redTraining(Request $request, $id) {
        $training = [];
        $training['id'] = $id;
        $training['heading'] = $request->heading;
        $training['shortDesc'] = $request->shortDesc;
        $training['desc'] = $request->desc;
        $training['date_start'] = $request->date_start;
        $training['date_end'] = $request->date_end;

        $validateTraining = TrainerModel::validateTraining($training);

        if(!$validateTraining['result']) {
            return \json_encode($validateTraining);
        }

        $addingTraining = TrainerModel::redactTraining($training);

        return \json_encode($addingTraining);

    }

    public function users() {
        $users = TrainerModel::getAllUsers();

        return view('trainer.users.users', compact('users'));
    }

    public function user($id) {
        $user = TrainerModel::getUser($id);

        $userData = $user[0];

        return view('trainer.users.user', compact('userData'));
    }

    public function allFood() {
        $food = TrainerModel::getAllFood();

        return view('trainer.foods.all_food', compact('food'));
    }

    public function food($id) {
        $food = TrainerModel::getUserFood($id);

        return view('trainer.foods.food', compact('food'));
    }

    public function addFood(Request $request, $id) {
        $food = [];
        $food['desc'] = $request->desc;
        $food['id'] = $id;

        $addingFood = TrainerModel::addFood($food);

        return \json_encode($addingFood);
    }

    public function stress() {
        $stress_tests = TrainerModel::getAllStressTests();

        return view('trainer.stress.stress', compact('stress_tests'));
    }

    public function stressTest($id) {
        $stress_test = TrainerModel::getStressTest($id);

        return view('trainer.stress.stress_test', compact('stress_test'));
    }

    public function addTest(Request $request) {
        $test = [];
        $test['heading'] = $request->heading;
        $test['shortDesc'] = $request->shortDesc;
        $test['desc'] = $request->desc;
        $test['date_start'] = $request->date_start;

        $validateTest = TrainerModel::validateTraining($test);

        if(!$validateTest['result']) {
            return \json_encode($validateTest);
        }

        $addingTest = TrainerModel::addTest($test);

        return \json_encode($addingTest);
    }

    public function redTest(Request $request, $id) {
        $test = [];
        $test['id'] = $id;
        $test['heading'] = $request->heading;
        $test['shortDesc'] = $request->shortDesc;
        $test['desc'] = $request->desc;
        $test['date_start'] = $request->date_start;

        $validateTest = TrainerModel::validateTraining($test);

        if(!$validateTest['result']) {
            return \json_encode($validateTest);
        }

        $addingTest = TrainerModel::redactTest($test);

        return \json_encode($addingTest);

    }

    public function faq() {
        $faq = TrainerModel::getQuestions();

        return view('trainer.faq.faq', compact('faq'));
    }

    public function faqAnswer($id) {
        $question = TrainerModel::getFaqQuestion($id);

        return view('trainer.faq.faqAnswer', compact('question'));
    }

    public function addAnswer(Request $request) {
        $answer = [];
        $answer['desc'] = $request->message;
        $answer['id'] = $request->id;
        $answer['user_id'] = $request->user_id;

        $addingAnswer = TrainerModel::addAnswer($answer);

        return \json_encode($addingAnswer);
    }

    public function editAnswer(Request $request) {
        $answer = [];
        $answer['desc'] = $request->message;
        $answer['id'] = $request->id;
        $answer['user_id'] = $request->user_id;

        $addingAnswer = TrainerModel::editAnswer($answer);

        return \json_encode($addingAnswer);
    }

    public function reports($id) {
        $report = TrainerModel::getAllReports($id);

        return view('trainer.reports.reports', compact('report'));
    }

    public function reportAnswer($id, $report_id) {
        $report = TrainerModel::getReport($id, $report_id);

        return view('trainer.reports.report', compact('report'));
    }

    public function addAnswerReport(Request $request, $id, $report_id) {
        $answer = [];
        $answer['msg'] = $request->message;
        $answer['user_id'] = $id;
        $answer['report_id'] = $report_id;
        $answer['mark'] = $request->mark;

        $addingAnswer = TrainerModel::addAnswerReport($answer);

        return \json_encode($addingAnswer);
    }

    public function openAccess($id) {
        $open = TrainerModel::openUserAccess($id);

        return \json_encode($open);
    }

    public function closeAccess($id) {
        $close = TrainerModel::closeUserAccess($id);

        return \json_encode($close);
    }

    public function rules() {
        $rules = TrainerModel::getRules();

        return view('trainer.rules', compact('rules'));
    }

    public function editRules(Request $request) {
        $message = $request->description;
        $rules = TrainerModel::editRules($message);

        return \json_encode($rules);
    }
}