@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/fileSaver/FileSaver.js')}}"></script>
    <script src="{{URL::asset('js/fileSaver/jquery.wordexport.js')}}"></script>
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
        <h1 class="center">Питание</h1>
        <div class="center btn btn-default" id="redFood">
            <a href="{{URL::asset('tasks/third')}}">Редактировать анкету</a>
        </div>
        <div id="export-content">

            <p>This is my content</p>
            <p><b>And this is bold</b></p>

        </div>
        <a class="word-export" href="javascript:void(0)"> Загрузить в формате Word </a>
    </div>

            </div>
        </section>
    </section>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("a.word-export").click(function(event) {
                $("#export-content").wordExport();
            });
        });
    </script>

@endsection