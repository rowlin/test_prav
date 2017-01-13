@extends('layouts.app')

@section('headData')

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
                <?php
                    $count = 1;
                    $now = date('Y-m-d');
                ?>
                <section class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="row">
                <div class="main_6a">
                    <div class="main_b_6a">
                    @foreach($training as $t)
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="adap_6a">
                        <div class="bloc_1_6a">
                            <div class="bloc_1_a_6a">
                                <div class="up_6a">Тренировка №{{$count}}</div>
                                <div class="up_6a">{{$t->heading}}</div>
                                <div class="ine_6a">
                                    <div class="col-xs-4 col-sm-4 col-md-4	col-lg-4 awesome_main_6a">
                                        <input type="radio" name="Exercise No.1" class="radio_6a" id="radio1_6a">
                                        <label for="radio1_6a"></label>
                                        <input type="radio" name="Exercise No.1" class="radio_6a" id="radio2_6a">
                                        <label for="radio2_6a"></label>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8	col-lg-8 button_podrob_6a">
                                        <button class="button_right_6a">
                                            @if($now < $t->date_start)
                                                Доступно с {{$t->date_start}}
                                            @else
                                                <a href="{{URL::asset('/training/'.$t->id)}}">Подробнее</a>
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count++ ?>
                </div>
                @endforeach
                        </div>
                        </div>
                    </div>
                    </section>

            </div>
        </section>
    </section>

@endsection