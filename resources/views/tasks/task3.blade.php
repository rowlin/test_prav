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
        <h1 class="center">Задание номер 3</h1>
        <h2 class="center">Пожалуйста, заполните опросный лист</h2>

        <div class="center" id="task3">
            <input type="text" name="weight" id="weight" placeholder="Ваш вес">
            <input type="text" name="length" id="length" placeholder="Ваш рост">
            <div class="error"></div>
            <div class="btn btn-default" id="btnTask3">
                <a>Сохранить</a>
            </div>
        </div>

    </div>

    <script>
        var form = $('#task3');
        form.on('click', '#btnTask3', function() {
            third_task();
        })
    </script>

@endsection