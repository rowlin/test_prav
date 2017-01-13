@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/report.js')}}"></script>
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
                        <section class="page_third_3">
                            <div class="name_otchet_3a moi_param_3a">
                                ОТЧЕТ ПО ПИТАНИЮ
                            </div>
                            @if($message)
                                <?php $total = count($message); $counter = 0; $message=array_reverse($message)?>
                                @foreach($message as $m)
                                    <?php $counter++ ?>
                                    @if($counter == 1 && $m->answer_message)
                            <div id="report" class="">
                                <div class="bloc_1_3a">
                                    <div class="row">
                                        <form>
                                            <textarea name="editor1" id="message" rows="10" cols="80">

                                            </textarea>
                                            <script>
                                                CKEDITOR.replace( 'editor1' );
                                            </script>
                                        </form>
                                        <div class="button_div_3a">
                                            <button class="button_3a">
                                                <a class="pd_lf_20_3a" href="index.html" target="_self">добавить фото</a>
                                            </button>
                                        </div>
                                        <div class="button_div_otp_3a">
                                            <button class="button_3a">
                                                <a id="sendReport" class="pd_lf_20_3a" target="_self">отправить</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="error"></div>
                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @if($message)
                                <?php $total = count($message);?>
                                @foreach($message as $m)
                                        @if($m->answer_message)
                                            <div class="pd_top_20_3a">
                                                <div class="bloc_3_3a">
                                                    <div class="circle_bloc_3a"> <div id="circle_3a"></div> </div>
                                                    <div class="otchet_3a"> {{$m->answer_message}}</div>
                                                </div>
                                            </div>
                                        @endif


                            <div class="pd_top_20_3a">
                                <div class="bloc_2_3a">
                                    <div class="circle_bloc_3a"> <div id="circle_3a"></div> </div>
                                    <div class="otchet_3a"> отчет </div>
                                    <div class="report">
                                        {{$m->report_message}}
                                    </div>
                                    <table class="w_100 appraisal_tab_3a">
                                        @if($m->mark != 0)
                                        <tr class="">
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Отлично
                                                    @if($m->mark == 1)
                                                        <input checked type="checkbox" name="report1" class="radio_3a" id="radio1_{{$m->report_id}}" />
                                                    @else
                                                        <input disabled type="checkbox" name="report1" class="radio_3a" id="radio1_{{$m->report_id}}" />
                                                    @endif
                                                    <label for="radio1_{{$m->report_id}}"></label></div>
                                            </td>
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Хорошо
                                                    @if($m->mark == 2)
                                                        <input checked type="checkbox" name="report1" class="radio_3a" id="radio2_{{$m->report_id}}" />
                                                    @else
                                                        <input disabled type="checkbox" name="report1" class="radio_3a" id="radio2_{{$m->report_id}}" />
                                                    @endif
                                                    <label for="radio2_{{$m->report_id}}"></label></div>
                                            </td>
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Так себе
                                                    @if($m->mark == 3)
                                                        <input checked type="checkbox" name="report1" class="radio_3a" id="radio3_{{$m->report_id}}" />
                                                    @else
                                                        <input disabled type="checkbox" name="report1" class="radio_3a" id="radio3_{{$m->report_id}}" />
                                                    @endif
                                                    <label for="radio3_{{$m->report_id}}"></label></div>
                                            </td>
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Плохо
                                                    @if($m->mark == 4)
                                                        <input checked type="checkbox" name="report1" class="radio_3a" id="radio4_{{$m->report_id}}" />
                                                    @else
                                                        <input disabled type="checkbox" name="report1" class="radio_3a" id="radio4_{{$m->report_id}}" />
                                                    @endif
                                                    <label for="radio4_{{$m->report_id}}"></label></div>
                                            </td>
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Мда..
                                                    @if($m->mark == 5)
                                                        <input checked type="checkbox" name="report1" class="radio_3a" id="radio5_{{$m->report_id}}" />
                                                    @else
                                                        <input disabled type="checkbox" name="report1" class="radio_3a" id="radio5_{{$m->report_id}}" />
                                                    @endif
                                                    <label for="radio5_{{$m->report_id}}"></label>
                                                </div>
                                            </td>
                                        </tr>
                                     @endif
                                    </table>
                                </div>
                            </div>
                                @endforeach

                            @endif



                        </section>
                    </div>
                </section>
            </div>
        </section>
    </section>


    <script>
function send_x() {
    var form = $('#report');
    form.on('click', '#sendReport', function () {

        sendReport();
    })
}

    </script>

@endsection