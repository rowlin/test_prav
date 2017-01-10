@extends('layouts.app')

@section('headData')
@endsection

@section('wrapper')
    <section class="home">
        @include('elements.headerTrainer')
            @include('elements.navTrainer')
        <section class="main">
            <div class="container">
                <div class="row">
                    <div class="poisc">
                        <div class="text_poisc">
                            <b>Поиск участника</b>
                        </div>
                        <form class="form-wrapper cf">
                            <input type="search" name="q" placeholder="Поиск по сайту">
                        </form>
                    </div>
                    <div class="pole_uchastnicov">
                        <div class="table-responsive">
                            <table>
                                <tr class="ul_pole_uchastnicov_1a">
                                    <th class="li_pole_uchastnicov_1a f15 border-r">Список участников</th>
                                    <th class="li_pole_uchastnicov_1a f15 border-r">Питание</th>
                                    <th class="li_pole_uchastnicov_1a f15 border-r">Тренировки</th>
                                    <th class="li_pole_uchastnicov_1a f15 border-r">Анкета питания</th>
                                    <th class="li_pole_uchastnicov_1a f15 border-r">Спецзадание</th>
                                    <th class="li_pole_uchastnicov_1a f15 border-r">Баланс</th>
                                    <th class="li_pole_uchastnicov_1a f15 border-r">Оплата</th>
                                    <th class="li_pole_uchastnicov_1a f15 prav">Доступ</th>
                                </tr>
                                @foreach($users as $user)

                                <tr class="ul_pole_uchastnicov_2_1a border_bottom">
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">
                                        <div class="ico_uchastnica">
                                            <img src="img/ico_polzov.png" alt="icon">
                                        </div>
                                        <div class="uchastnic"><a href="{{URL::asset('users/'.$user->id)}}">
                                                {{$user->name}} <br>
                                                {{$user->surname}}
                                            </a></div>
                                    </td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">к отчёту </br> 12.10.2016 </td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">к отчёту </br> 12.10.2016</td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b"><a
                                                href="{{URL::asset('/food/'.$user->id)}}">Анкета</a></td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">к отчёту </br> 12.10.2016</td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">
                                        <div class="balans">
                                            <div>
                                                <input name="q" placeholder="00000">
                                            </div>
                                            <div class="plus_minus">
                                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                <i class="fa fa-minus-square" aria-hidden="true"></i>
                                            </div>
                                            <div>3000</div>
                                        </div>
                                    </td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">3000</td>
                                    <td class="li_pole_uchastnicov_2_1a cnop_prav prav f15">
                                        <button class="cnop_otcryt">
                                            <div class="mg_top-6"><a href="index.html" target="_self" class="Normal_uchas">открыть</a></div>
                                        </button>
                                        <button class="cnop_zacryt">
                                            <div class="mg_top-6"><a href="index.html" target="_self" class="Normal_uchas">закрыть</a></div>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection