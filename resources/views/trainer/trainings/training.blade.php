@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/training.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <div id="redact" class="btn btn-default">
                    <a>Редактировать</a>
                </div>
                <div id="training">
                    <h1>Тренировка №{{$training->id}}</h1>
                    <input id="heading" name="heading" type="text" value="{{$training->heading}}">
                    <form>
                        <textarea name="shortDesc" id="shortDesc" rows="10" cols="80">
                            {{$training->short_desc}}
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'shortDesc' );
                        </script>
                    </form>
                    <form>
                        <textarea name="desc" id="desc" rows="10" cols="80">
                            {{$training->description}}
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'desc' );
                        </script>
                    </form>
                    <input value="{{$training->date_start}}" class="form-control" type="text" name="date_start" id="date_start" placeholder="Дата старта">
                    <input value="{{$training->date_end}}" class="form-control" type="text" name="date_end" id="date_end" placeholder="Дата окончания">
                    <div class="error"></div>
                    <div class="btn btn-default">
                        <a href="{{URL::asset('/trainer/trainings')}}">К списку тренировок</a>
                    </div>
                </div>
            </div>

        </section>
    </section>

    <script>
        var form = $('#training');
        $(document).on('click', '#redact', function() {
            var id = '{{$training->id}}';
            redactTraining(id);
        });

        form.find('input[id=date_start]').datepicker({
            weekStart: 1,
            language: "ru",
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });

        form.find('input[id=date_end]').datepicker({
            weekStart: 1,
            language: "ru",
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });
    </script>

@endsection