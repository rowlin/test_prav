@extends('layouts.app')

@section('header')
    @include('elements.headerUser')
@endsection

@section('navigation')
    @include('elements.navUser')
@endsection

@section('wrapper')

    <div class="info">

        <img src="{{URL::asset('images/teloMechty.png')}}" alt="">
        <div id="more">
            <a href="{{URL::asset('/tasks')}}">Подробнее</a>
        </div>

    </div>

@endsection