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
            <h1>День {{$num_day}}</h1>
        </div>
    </div>
@endsection