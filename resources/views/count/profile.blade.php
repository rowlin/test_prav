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


                            <h2>информация о пользователе </h2>


                        </section>
                    </div>
                </div>
            </section>

@endsection