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

                            @foreach($message as $m)

                            <div class="pd_top_20_3a">
                                <div class="bloc_2_3a">
                                    <div class="circle_bloc_3a"> <div id="circle_3a"></div> </div>
                                    <div class="otchet_3a"> отчет </div>
                                    <div class="report">
                                        <?php echo $m->message ?>
                                    </div>
                                    <table class="w_100 appraisal_tab_3a">
                                        <tr class="">
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Отлично
                                                    <input type="radio" name="report1" class="radio_3a" id="radio_3a" />
                                                    <label for="radio_3a"></label>
                                                    <!--<input type="radio" id="cb_1" />
                                                    <label for="cb_1"></label>-->
                                                    <!--<i class="fa fa-square-o" aria-hidden="true"></i>
                                                    <i class="fa fa-square" aria-hidden="true" id="cb_1"></i>-->
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Хорошо
                                                    <input type="radio" name="report1" class="radio_3a" id="radio2_3a" />
                                                    <label for="radio2_3a"></label>
                                                    <!--<input type="radio" id="cb_2" />
                                                    <label for="cb_2"></label>	-->
                                                    <!--<i class="fa fa-check" aria-hidden="true" id="cb_1"></i>
                                                    <i class="fa fa-check-square" aria-hidden="true" id="cb_1"></i>-->
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Так себе
                                                    <input type="radio" name="report1" class="radio_3a" id="radio3_3a" />
                                                    <label for="radio3_3a"></label>
                                                    <!--<input type="radio" id="cb_3" />
                                                    <label for="cb_3"></label>-->
                                                    <!--<i class="fa fa-square-o" aria-hidden="true"></i>
                                                    <i class="fa fa-square" aria-hidden="true" id="cb_1"></i>-->
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="appraisal_3a">
                                                    Плохо
                                                    <input type="radio" name="report1" class="radio_3a" id="radio4_3a" />
                                                    <label for="radio4_3a"></label>
                                                    <!--<input type="radio" id="cb_4" />
                                                    <label for="cb_4"></label>-->
                                                    <!--<i class="fa fa-square-o" aria-hidden="true"></i>
                                                    <i class="fa fa-square" aria-hidden="true" id="cb_1"></i>-->
                                                </div>
                                            </td>
                                            <td class="">
                                                <div class="appraisal_3a">Мда..</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            @endforeach

                            <div class="pd_top_20_3a">
                                <div class="bloc_3_3a">
                                    <div class="circle_bloc_3a"> <div id="circle_3a"></div> </div>
                                    <div class="otchet_3a"> Ответ </div>
                                </div>
                            </div>

                        </section>
                    </div>
                </section>
            </div>
        </section>
    </section>


    <script>

        var form = $('#report');
        form.on('click', '#sendReport', function() {
            sendReport();
        })

    </script>

@endsection