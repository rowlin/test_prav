@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ajaxTasks.js')}}"></script>
@endsection

@section('header')
    @include('elements.headerUser')
@endsection

@section('navigation')
    @include('elements.navUser')
@endsection

@section('wrapper')

    <div class="container">
        <h1 class="center">Задание номер 2</h1>
        <h2 class="center">Пожалуйста, заполните Ваши параметры</h2>
        <div id="task2" class="col-xs-offset-2">
            <input type="text" name="weight" id="weight" placeholder="Вес">
            <input type="text" name="waist" id="waist" placeholder="Талия">
            <input type="text" name="chest" id="chest" placeholder="Грудь">
            <input type="text" name="hip" id="hip" placeholder="Бедро">
            <div class="error"></div>
            <div class="btn btn-default" id="btnTask2">
                <a>Сохранить</a>
            </div>

        </div>
    </div>

    <script>
        var form = $('#task2');
        form.on('click', '#btnTask2', function() {
            second_task();
        })
    </script>

@endsection