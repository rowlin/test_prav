@extends('layouts.app')

@section('wrapper')

            <section class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="row">
                    <div id="profile" class="main_2">

                        @if(Session::has('message'))
                            <div class="alert-box success">
                                <h2>{!! Session::get('message') !!}</h2>
                            </div>
                        @endif
                        <section>

                            <div class="form-inline">
                                <a href="/count">Рейтинг</a>
                                <a href="/first">Первый шаг</a>
                                <a href="/second">Второй</a>
                                <a href="/third">Третий</a>
                            </div>


                            <h2>Страница {{ $user->name }}</h2>

                            <img src="{{ $user->avatar}}">
                            <div>
                             <p> имя {{ $user->firstTask->username }}</p>
                             <p> Фамилия  {{ $user->firstTask->surname }}</p>
                             <p> Дата рождения: {{ $user->firstTask->birthday }}</p>
                             <p> пол:   {{ $user->firstTask->gender }} </p>
                             <p>weight: {{ $user->secondTask->weight }}</p>
                             <p>hip: {{ $user->secondTask->hip }}</p>
                             <p> {{ $user->thirdTask->hip }} </p>



                                </div>





                        </section>
                    </div>
                </div>
            </section>

@endsection