@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ajaxTasks.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
@endsection

@section('header')
    @include('elements.headerUser')
@endsection

@section('navigation')
    @include('elements.navUser')
@endsection

@section('wrapper')
    <?php
        $userData = \Auth::user();
    ?>

    <div class="container">
        <h1 class="center">Задание номер 1</h1>
        <h2 class="center">Пожалуйста, заполните Ваш профиль</h2>

        <div class="col-md-4">
            <img class="addPhoto" src="{{URL::asset('images/addPhoto.png')}}" alt="">
        </div>
        <div id="task1">
            <div class="col-md-4 inputText">
                <input type="text" name="name" id="name" placeholder="Имя" value="{{$userData->name}}">
                <input type="text" name="surname" id="surname" placeholder="Фамилия">
                <input type="text" name="phone" id="phone" placeholder="Телефон" value={{$userData->phone}}>
                <input type="text" name="birthday" id="birthday" placeholder="Дата рождения" class="form-control">
                <input type="text" name="username" id="username" placeholder="Логин">
            </div>
            <div class="col-md-4 inputText">
                <select name="gender" id="gender">
                    <option disabled selected>Выберите пол</option>
                    <option value="male">Мужской</option>
                    <option value="female">Женский</option>
                </select>
                <input type="text" name="country" id="country" placeholder="Страна">
                <input type="text" name="city" id="city" placeholder="Город">
                <input type="text" name="email" id="email" placeholder="E-mail" value="{{$userData->email}}">
                <input type="text" name="password" id="password" placeholder="Пароль">
                <input type="file" name="avatar" id="avatar">
            </div>
            <div class="col-md-offset-4 col-md-4">
                <p class="error"></p>
            </div>
            <div class="btn btn-default col-md-offset-4 col-md-4" id="sendInfo">
                <a>Сохранить</a>
            </div>
        </div>
    </div>

    <script>
        var form = $('#task1');
        form.on('click', '#sendInfo', function() {
            first_task();
        });
        $('#task1 input[id=birthday]').datepicker({
            weekStart: 1,
            language: "ru",
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });
    </script>

@endsection