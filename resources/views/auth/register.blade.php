@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ajaxAuth.js')}}"></script>
@endsection

@section('wrapper')
    <?php
    if (!session()->has('error')) {
        $error = false;
    } else {
        $error = session()->get('error');
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Регистрация</div>
                    <div class="panel-body">
                        <div id="authRegForm">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-3"><label for="regName">Имя</label></div>
                                        <div class="col-xs-9"><input type="text" name="name" id="regName"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-3"><label for="regEmail">E-mail</label></div>
                                        <div class="col-xs-9"><input type="text" name="email" id="regEmail"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-3"><label for="regPhone">Телефон</label></div>
                                        <div class="col-xs-9"><input type="text" name="phone" id="regPhone"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-3"><label for="regCode">Уникальный код</label></div>
                                        <div class="col-xs-9"><input type="text" name="code" id="regCode"></div>
                                    </div>
                                </div>
                                <?php
                                    echo $error;
                                ?>
                                <div class="errorSection">
                                    <p class="errorText"></p>
                                </div>
                                <div class="col-xs-offset-4 col-xs-4">
                                    <div class="btn btn-default" id="register">
                                        <a>Зарегистрироваться</a>
                                    </div>
                                </div>
                                <div>
                                    Уже зарегистрированы? <a href="{{URL::asset('/auth/login')}}">Войти</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        var reg = $('#authRegForm');
        reg.on('click', '#register', function() {
            ajaxRegister();
        })

    </script>
@endsection
