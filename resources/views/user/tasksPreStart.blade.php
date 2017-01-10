@extends('layouts.app')

@section('headData')
    <link rel="stylesheet" href="{{URL::asset('css/countdown.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/jquery.countdown.css')}}" />
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

    <div class="container">
        <h1 class="center">Торопись! Старт уже через</h1>
    </div>

    <div id="countdown"></div>

    <p id="note"></p>

    <div id="firstTasks" class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="task">
                    День первый
                    <div id="preTask1">
                        <a href="{{URL::asset('/tasks/first')}}">Пройти</a>
                    </div>
                    <div id="task1" class="taskHide">Выполнено</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="task">
                    День второй
                    <div id="preTask2" class="taskHide">
                        <a href="{{URL::asset('/tasks/second')}}">Пройти</a>
                    </div>
                    <div id="task2" class="taskHide">Выполнено</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="task">
                    День третий
                    <div id="preTask3" class="taskHide">
                        <a href="{{URL::asset('/tasks/third')}}">Пройти</a>
                    </div>
                    <div id="task3" class="taskHide">Выполнено</div>
                </div>
            </div>
        </div>
    </div>

            </div>
        </section>
    </section>


    <script src="{{URL::asset('js/jquery.countdown.js')}}"></script>
    <script src="{{URL::asset('js/countdown.js')}}"></script>
    <script src="{{URL::asset('js/ajaxTasks.js')}}"></script>
    <script>
        var form = $('#firstTasks');
        var firstChange = getFirstChange();
        var secondChange = getSecondChange();
        var thirdChange = getThirdChange();
        if (firstChange == true) {
            form.find('#preTask1').addClass('taskHide');
            form.find('#task1').removeClass('taskHide');
            form.find('#preTask2').removeClass('taskHide');
        }
        if(secondChange == true) {
            form.find('#preTask2').addClass('taskHide');
            form.find('#task2').removeClass('taskHide');
            form.find('#preTask3').removeClass('taskHide');
        }
        if(thirdChange == true) {
            form.find('#preTask3').addClass('taskHide');
            form.find('#task3').removeClass('taskHide');
        }
    </script>

@endsection