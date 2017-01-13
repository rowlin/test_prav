@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/faq.js')}}"></script>
    <script src="{{URL::asset('js/ajaxTasks.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
    <style>
        .thumbnail{
            height: 100px;
            margin: 10px;
        }
    </style>
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerUser')
        @include('elements.nav2user')

        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navUser')

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            @if(Session::has('success'))
                                <div class="alert-box success">
                                    <h2>{!! Session::get('success') !!}</h2>
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <p class="errors">{!! Session::get('error') !!}</p>
                            @endif


                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <section>
                                <h2>Задание №2</h2>

                                {{ Form::open(array('url'=>'second','method'=>'POST','files'=>true)) }}
                                <div class="form-inline">
                                    <div class="form-group">
                                        {{ Form::label('weight', 'Ваш Вес') }}
                                        {{ Form::input('text', 'weight',null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('waist', 'Размер талии') }}
                                        {{ Form::input('text','waist',null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('chest', 'Размер груди') }}
                                        {{ Form::input('text', 'chest',null, array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('hip', 'Размер таза') }}
                                        {{ Form::input('text','hip',null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="table-responsive_2">
                                        <table class="w_100">
                                            <tbody><tr class="ul_pole_uchastnicov_2_2">
                                                <td class="border-foto_2 txt_al_ct border-r_1_2"><div class="file_foto_2">ФОТО СПЕРЕДИ{{ Form::file('image1', array( 'id' =>'files')) }}</div></td>
                                                <td class="border-foto_2 txt_al_ct"><div class="file_foto_2">ФОТО СЗАДИ {{ Form::file('image2', array( 'id' =>'files')) }}</div></td>
                                            </tr>

                                            <tr class="ul_pole_uchastnicov_2_2">
                                                <td class="border-foto_2 txt_al_ct border-r_1_2"><div class="file_foto_2">ФОТО СЛЕВА {{ Form::file('image3', array( 'id' =>'files')) }}</div></td>
                                                <td class="border-foto_2 txt_al_ct"><div class="file_foto_2">ФОТО СПРАВА <br>{{ Form::file('image4', array( 'id' =>'files')) }}</div></td>
                                            </tr>
                                            </tbody>
                                        </table><!--table-->
                                    </div>
                                {{ Form::submit('Submit', array('class'=>'send-btn')) }}
                                {{ Form::close() }}
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <script>
            $('#datepicker').datepicker({format: 'yyyy-mm-dd', locale:'ru'})

        </script>


@endsection
