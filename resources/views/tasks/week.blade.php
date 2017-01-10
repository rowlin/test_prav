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
            <h2>Неделя {{$num_week}}</h2>
            <div>
                <h3>День 1</h3>
                <div id="btnWeek1" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_'.$num_week.'/day_1')}}">Подробнее</a>
                </div>
                <h3>День 2</h3>
                <div id="btnWeek2" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_'.$num_week.'/day_2')}}">Подробнее</a>
                </div>
                <h3>День 3</h3>
                <div id="btnWeek3" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_'.$num_week.'/day_3')}}">Подробнее</a>
                </div>
                <h3>День 4</h3>
                <div id="btnWeek4" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_'.$num_week.'/day_4')}}">Подробнее</a>
                </div>
                <h3>День 5</h3>
                <div id="btnWeek4" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_'.$num_week.'/day_5')}}">Подробнее</a>
                </div>
                <h3>День 6</h3>
                <div id="btnWeek4" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_'.$num_week.'/day_6')}}">Подробнее</a>
                </div>
                <h3>День 7</h3>
                <div id="btnWeek4" class="btn btn-default">
                    <a href="{{URL::asset('/month_'.$num_month.'/week_'.$num_week.'/day_7')}}">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
@endsection