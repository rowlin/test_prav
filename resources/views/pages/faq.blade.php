@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/faq.js')}}"></script>
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
                <div class="btn btn-default" id="question">
                    <a>Задать вопрос</a>
                </div>
                <div class="col-md-offset-2 col-md-8" id="formQuest" style="display: none">
                    <div class="bloc_1_3a">
                        <div class="row">
                            <form>
                                        <textarea name="editor1" id="message" rows="10" cols="80">

                                        </textarea>
                                <script>
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                            </form>
                            <div class="button_div_otp_3a">
                                <button class="button_3a">
                                    <a id="sendQuest" class="pd_lf_20_3a" target="_self">отправить</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="error"></div>
                </div>
            </div>
        </section>
    </section>

    <script>
        $(document).on('click', '#question', function() {
            $('#formQuest').show();
        });

        $(document).on('click', '#sendQuest', function() {
            sendQuest();
        })
    </script>
@endsection