@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ajaxAuth.js')}}"></script>
@endsection

@section('wrapper')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Вход</div>
                    <div class="panel-body">
                        <div id="loginForm">
                            <input type="text" name="username" id="username" placeholder="Логин">
                            <input type="text" name="password" id="password" placeholder="Пароль">
                            <div class="error">

                            </div>
                            <div class="btn btn-default" id="login">
                                <a>Войти</a>
                            </div>
                            <div>
                                Еще не зарегистрированы? <a href="{{URL::asset('/auth/register')}}">Зарегистрироваться</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        var log = $('#loginForm');
        log.on('click', '#login', function() {
            ajaxLogin();
        })

    </script>
@endsection
