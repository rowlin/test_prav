@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/profile.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <section class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="row">
                        <div id="profile" class="main_2">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="circle_2">
                                    <img id="circle_2" src="{{URL::asset('images/defaultAvatar.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="regest_2">
                                    <div class="pole_regest_2">
                                        <input type="text" name="name" id="profileName" placeholder="Имя" value="{{$userData->name}}">
                                    </div>
                                    <div class="pole_regest_2">
                                        <input type="text" name="surname" id="profileSurname" placeholder="Фамилия" value="{{$userData->surname}}">
                                    </div>
                                    <div class="pole_regest_2">
                                        <input type="text" name="phone" id="profilePhone" placeholder="Телефон" value="{{$userData->phone}}">
                                    </div>
                                    <div class="pole_regest_2">
                                        <input class="form-control" type="text" name="birthday" id="profileBirthday" placeholder="Дата рождения" value="{{$userData->birthday}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="regest_2">
                                    <div class="pole_regest_2">
                                        <select name="gender" id="gender">
                                            <option disabled>Выберите пол</option>
                                            <option
                                                    <?php if($userData->gender == 1) { ?>
                                                    selected
                                                    <?php } ?>
                                                    value="male">Мужской</option>
                                            <option
                                                    <?php if($userData->gender == 2) { ?>
                                                    selected
                                                    <?php } ?>
                                                    value="female">Женский</option>
                                        </select>
                                    </div>
                                    <div class="pole_regest_2">
                                        <input type="text" name="country" id="profileCountry" placeholder="Страна" value="{{$userData->country}}">
                                    </div>
                                    <div class="pole_regest_2">
                                        <input type="text" name="city" id="profileCity" placeholder="Город" value="{{$userData->city}}">
                                    </div>
                                    <div class="pole_regest_2">
                                        <input type="text" name="email" id="profileEmail" placeholder="E-mail" value="{{$userData->email}}">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="button_2">
                                    <a id="editProfile" class="pd_lf_20_2" target="_self">редактировать</a>
                                </button>
                            </div>
                            <div class="error"></div>
                        </div>

                    </div>
                </section>
            </div>
        </section>
    </section>

    <script>
        var form = $('#profile');
        form.on('click', '#editProfile', function() {
            edit_profile();
        });

        $('#profile input[id=profileBirthday]').datepicker({
            weekStart: 1,
            language: "ru",
            autoclose: true,
            todayHighlight: true
        });
    </script>

@endsection