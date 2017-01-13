@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/stress.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
@endsection
<?php ?>
@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <div id="redact" class="btn btn-default">
                    <a>Редактировать</a>
                </div>
                <div id="test">
                    <h1>Стресс-тест №{{$stress_test->id}}</h1>
                    <input id="heading" name="heading" type="text" value="{{$stress_test->heading}}">
                    <form>
                        <textarea name="shortDesc" id="shortDesc" rows="10" cols="80">
                            {{$stress_test->short_desc}}
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'shortDesc' );
                        </script>
                    </form>
                    <form>
                        <textarea name="desc" id="desc" rows="10" cols="80">
                            {{$stress_test->description}}
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'desc' );
                        </script>
                    </form>
                    <div class="">
                        <input value="{{$stress_test->date_start}}" class="form-control" type="text" name="date_start" id="date_start" placeholder="Дата начала">
                    </div>
                    <div class="error"></div>
                    <div class="btn btn-default">
                        <a href="{{URL::asset('/trainer/stress_tests')}}">К списку стресс-тестов</a>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script>
        $(document).on('click', '#redact', function() {
            var id = '{{$stress_test->id}}';
            redactTest(id);
        });

        $('#test input[id=date_start]').datepicker({
            weekStart: 1,
            language: "ru",
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });
    </script>
@endsection