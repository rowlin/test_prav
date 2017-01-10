@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/profile.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
@endsection


@section('wrapper')

    <section class="fon_2">
        @include('elements.headerUser')
        <section class="lt hidden-xs col-sm-0 col-md-0 col-lg-0">
            <div class="row">
                <div class="menu_2">
                    <ul class="ul_menu_2_bock">
                        <li class="li_menu_2 f14 menu_border_2"><a class="pd_lf_20_2" href="/" target="_self"></a></li>
                        <li class="li_menu_2 f14 menu_border_2"><a class="pd_lf_20_2" href="/" target="_self"></a></li>
                        <li class="li_menu_2 f14 menu_border_2"><a class="pd_lf_20_2" href="/" target="_self"></a></li>
                        <li class="li_menu_2 f14 menu_border_2"><a class="pd_lf_20_2" href="/" target="_self"></a></li>
                        <li class="li_menu_2 f14 menu_border_2"><a class="pd_lf_20_2" href="/" target="_self"></a></li>
                        <li class="li_menu_2 f14 menu_border_2"><a class="pd_lf_20_2" href="/" target="_self"></a></li>
                        <li class="li_menu_2 f14 menu_border_2"><a class="pd_lf_20_2" href="/" target="_self"></a></li>
                        <li class="li_menu_2 f14"><a href="/" target="_self" class="pd_lf_20_2"></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navUser')
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

                        <div class="moi_param_2">
                            МОИ ПАРАМЕТРЫ
                        </div>
                        <div class="table-responsive_2">
                            <table class="w_100">
                                <tr class="ul_pole_uchastnicov_2">
                                    <th class="border-r_2 txt_al_ct">Дата</th>
                                    <th class="border-r_2 txt_al_ct">Вес</th>
                                    <th class="border-r_2 txt_al_ct">Талия</th>
                                    <th class="border-r_2 txt_al_ct">Грудь</th>
                                    <th class="txt_al_ct">Бедра</th>
                                </tr>

                                <tr class="ul_pole_uchastnicov_2_2">
                                    <td class="border-r_b_2 txt_al_ct">
                                        <div class="file_2">
                                            <input disabled type="text" name="date" id="date" placeholder="Дата" value="{{$userData->date_change}}">
                                        </div>
                                    </td>
                                    <td class="border-r_b_2 txt_al_ct">
                                        <div class="file_2">
                                            <input disabled type="text" name="weight" id="weight" placeholder="Вес" value="{{$userData->weight}}">
                                        </div>
                                    </td>
                                    <td class="border-r_b_2 txt_al_ct">
                                        <div class="file_2">
                                            <input disabled type="text" name="waist" id="waist" placeholder="Объем талии" value="{{$userData->waist}}">
                                        </div>
                                    </td>
                                    <td class="border-r_b_2 txt_al_ct">
                                        <div class="file_2">
                                            <input disabled type="text" name="chest" id="chest" placeholder="Объем груди" value="{{$userData->chest}}">
                                        </div>
                                    </td>
                                    <td class="txt_al_ct">
                                        <div class="file_2">
                                            <input disabled type="text" name="hip" id="hip" placeholder="Обхват бедра" value="{{$userData->hip}}">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="">
                            <div class="button_div_2">
                                <button class="button_2">
                                    <a class="pd_lf_20_2" href="/" target="_self">добавить новые замеры</a>
                                </button>
                            </div>
                            <div class="button_div_otp_2">
                                <button class="button_2">
                                    <a class="pd_lf_20_2" href="/" target="_self">отправить</a>
                                </button>
                            </div>
                        </div>
                        <div class="mg_top_60_2">
                            <div class="table-responsive_2">
                                <table class="w_100">
                                    <tr class="ul_pole_uchastnicov_2_2">
                                        <td class="border-foto_2 txt_al_ct border-r_1_2"><div class="file_foto_2">ФОТО СПЕРЕДИ</div></td>
                                        <td class="border-foto_2 txt_al_ct"><div class="file_foto_2">ФОТО СЗАДИ</div></td>
                                    </tr>

                                    <tr class="ul_pole_uchastnicov_2_2">
                                        <td class="border-foto_2 txt_al_ct border-r_1_2"><div class="file_foto_2">ФОТО СЛЕВА</div></td>
                                        <td class="border-foto_2 txt_al_ct"><div class="file_foto_2">ФОТО СПРАВА</div></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="">
                            <div class="button_div_2">
                                <button class="button_2">
                                    <a class="pd_lf_20_2" href="/" target="_self">добавить фото</a>
                                </button>
                            </div>
                            <div class="button_div_otp_2">
                                <button class="button_2">
                                    <a class="pd_lf_20_2" href="/" target="_self">отправить</a>
                                </button>
                            </div>
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