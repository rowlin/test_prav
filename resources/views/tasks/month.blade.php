@extends('layouts.app')

@section('headData')

@endsection

@section('header')
    @include('elements.headerUser')
@endsection

@section('navigation')
    @include('elements.navUser')
@endsection

@section('wrapper')
    <div class="container">
        <div class="center">
            <h1>Мои задания</h1>
            <h2>Месяц {{$num_month}}</h2>
            <div>
                <h3>Неделя 1</h3>
                <div id="btnWeek1" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_1')}}">Подробнее</a>
                </div>
                <h3>Неделя 2</h3>
                <div id="btnWeek2" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_2')}}">Подробнее</a>
                </div>
                <h3>Неделя 3</h3>
                <div id="btnWeek3" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_3')}}">Подробнее</a>
                </div>
                <h3>Неделя 4</h3>
                <div id="btnWeek4" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_4')}}">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
@endsection