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
            <h2>Месяц 1</h2>
            <div id="btnMonth" class="btn btn-default">
                <a href="{{URL::asset('/month_1')}}">Подробнее</a>
            </div>
        </div>
    </div>
@endsection