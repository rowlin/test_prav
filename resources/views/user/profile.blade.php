@extends('layouts.app')


@section('wrapper')

    <!--вся информация о пользователе-->

            <section class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="row">
                    <div id="profile" class="main_2">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">


                            @if(Session::has('success'))
                                <div class="alert-box success">
                                    <h2>{!! Session::get('success') !!}</h2>
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <p class="errors">{!! Session::get('error') !!}</p>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </section>



@endsection