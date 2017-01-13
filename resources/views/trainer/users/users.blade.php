@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/access.js')}}"></script>
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
                        {{Form::open(['method' => 'POST', 'action' => 'HelpController@searchUsers'])}}
                        <div id="searchForm" class="form-wrapper cf">
                            <input type="text" name="search" placeholder="Поиск по сайту">
                            <input type="submit" value="Найти">
                            <div class="error"></div>
                        </div>
                        {{Form::close()}}
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
                                    @if($user->code != 1)

                                <tr id="profile" class="ul_pole_uchastnicov_2_1a border_bottom">
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">
                                        <div class="ico_uchastnica">
                                            <img src="img/ico_polzov.png" alt="icon">
                                        </div>
                                        <div class="uchastnic"><a href="{{URL::asset('users/'.$user->id)}}">
                                                {{$user->name}} <br>
                                                {{$user->surname}}
                                            </a></div>
                                    </td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b"><a
                                                href="{{URL::asset('/reports/'.$user->id)}}">Отчет</a></td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">к отчёту </br> 12.10.2016</td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b"><a
                                                href="{{URL::asset('/food/'.$user->id)}}">Анкета</a></td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">к отчёту </br> 12.10.2016</td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">
                                        <div class="balans">
                                            <div>
                                                <input value="{{$user->pay}}" name="q" placeholder="00000">
                                            </div>
                                            <div class="plus_minus">
                                                <i data-pay="plus{{$user->id}}" class="pay_plus fa fa-plus-square" aria-hidden="true"></i>
                                                <i data-pay="minus{{$user->id}}" class="pay_minus fa fa-minus-square" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="li_pole_uchastnicov_2_1a f15 border-r_b">3000</td>
                                    <td class="li_pole_uchastnicov_2_1a cnop_prav prav f15">
                                        @if($user->active == 1)
                                            Доступ открыт
                                            <button data-number="{{$user->id}}" class="closeAccess cnop_zacryt">
                                                <div class="mg_top-6"><a target="_self" class="Normal_uchas">закрыть</a></div>
                                            </button>
                                            <div class="error"></div>
                                        @elseif($user->active == 2)
                                            Доступ закрыт
                                            <button data-number="{{$user->id}}" class="openAccess cnop_otcryt">
                                                <div class="mg_top-6"><a target="_self" class="Normal_uchas">открыть</a></div>
                                            </button>
                                            <div class="error"></div>
                                        @endif
                                    </td>
                                </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script>
        var form = $('#profile');
        $(function(){
            $(".openAccess").click(function(){
                var open_id =  $(this).data("number");
                openAccess(open_id);
            });

            $('.closeAccess').click(function() {
                var close_id = $(this).data('number');
                closeAccess(close_id);
            });

            $('.pay_plus').click(function() {
                var value = $(this).data('pay');
                console.log(value);
            });

            $('.pay_minus').click(function() {
                var value = $(this).data('pay');
                console.log(value);
            });
        });
    </script>
@endsection