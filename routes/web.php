<?php

Route::get('/count', 'CountController@index' );
Route::get('/first', 'TaskController@first_task');
Route::post('/first', 'TaskController@safe_first_task' );
Route::get('/second', 'TaskController@second_task');
Route::post('/second', 'TaskController@safe_second_task');
Route::get('/third', 'TaskController@third_task');
Route::post('/third', 'TaskController@safe_third_task');
Route::get('/user_profile','UserController@user_profile')->name('user_profile');




Route::get('/', 'PagesController@index');
Route::get('welcome', 'PagesController@welcome');
Route::get('/food', 'PagesController@food');
Route::get('/report', 'PagesController@report');
Route::get('/faq', 'PagesController@faq');
Route::get('/stress_test', 'PagesController@stressTest');
Route::get('/training', 'PagesController@training');
Route::get('/rating', 'PagesController@rating');


Route::get('profile', 'UserController@profile')->middleware('allTasks');
Route::get('tasks', 'UserController@tasks');
Route::post('edit/profile', 'UserController@editProfile');
Route::post('edit/report', 'UserController@editReport');
Route::post('edit/faq', 'UserController@editFaq');

Route::get('tasks/first', 'Tasks\TaskController@showFirstTask')->middleware('firstTask');
Route::get('tasks/second', 'Tasks\TaskController@showSecondTask')->middleware('secondTask');
Route::get('tasks/third', 'Tasks\TaskController@showThirdTask')->middleware('thirdTask');;
Route::post('/task1', 'Tasks\TaskController@firstTask');
Route::post('/task2', 'Tasks\TaskController@secondTask');
Route::post('/task3', 'Tasks\TaskController@thirdTask');
Route::get('/checkFirstTask', 'Tasks\TaskController@checkFirstTask');
Route::get('/checkSecondTask', 'Tasks\TaskController@checkSecondTask');
Route::get('/checkThirdTask', 'Tasks\TaskController@checkThirdTask');

Route::get('/month_{num_month}', 'Tasks\MonthController@showMonth');

Route::get('/month_{num_month}/week_{num_week}', 'Tasks\WeekController@showWeek');

Route::get('/month_{num_month}/week_{num_week}/day_{num_day}', 'Tasks\DayController@showDay');

Route::get('auth/login', 'AuthController@showLogin')->middleware('loginUser');
Route::get('auth/register', 'AuthController@showRegister')->middleware('authUser');
Route::post('/registerUser', 'AuthController@registerUser');
Route::post('/loginUser', 'AuthController@loginUser');
Route::get('/logout', 'AuthController@logout');

Route::get('/me', 'TrainerController@index');
Route::get('/trainer/trainings', 'TrainerController@trainings');
Route::get('/trainings/{id}', 'TrainerController@training');
Route::get('/users', 'TrainerController@users');
Route::get('/users/{id}', 'TrainerController@user');
Route::get('/food/{id}', 'TrainerController@food');
Route::post('/add/training', 'TrainerController@addTraining');
Route::post('/red/training/{id}', 'TrainerController@redTraining');
Route::post('/add/food/{id}', 'TrainerController@addFood');

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'AuthController@logout');


Route::get('/test', 'TestController@showTest');
Route::post('/check/test', 'TestController@test');
