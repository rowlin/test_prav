@extends('layouts.app')

@section('headData')
    <style>
        section{
            display: block;
            padding:10px;
        }
        section div{
            display: inline-block;
        }

        section img{
            width: 100px;;
        }

        section #name{
            padding :20px;
        }

        section #status{
            display: block;
            float: right;
        }


        section #status span{
            color:red;
        }

        section #many{
            padding: 20px;;
            display: block;
            float: right;
        }

        section #plus{
            font-size: 2rem;
        }


        section #minus{
            font-size: 2rem;
        }



    </style>
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

            </div>
        </section>
    </section>

@endsection